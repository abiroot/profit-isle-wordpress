<?php
/**
 *
 */

if (!class_exists('PROFITBakeryElements')) {

	class PROFITBakeryElements
	{

		/**
		 * Main constructor
		 */
		public function __construct()
		{
			require_once("fields/VC_Field_Abstract.php");
			require_once("elements/VC_Element_Abstract.php");

			//Custom Fields
			$fieldsPaths = [
				"fields/AbirootHTML/AbirootHTML.php",
			];
			foreach ($fieldsPaths as $fieldPath) {
				$this->registerField($fieldPath);
			}

			$elementsPaths = [
                "elements/PROBeyondAverage/PROBeyondAverage.php",
                "elements/PROBooksSection/PROBooksSection.php",
                "elements/PROCapabilitiesSection/PROCapabilitiesSection.php",
                "elements/PROCenterLoopDescription/PROCenterLoopDescription.php",
                "elements/PROGridIconSection/PROGridIconSection.php",
                "elements/PROLinearGradient/PROLinearGradient.php",
                "elements/PROLinearGradientBackground/PROLinearGradientBackground.php",
                "elements/PROMessyData/PROMessyData.php",
                "elements/PRONewsAndEvents/PRONewsAndEvents.php",
                "elements/PRONewsLetter/PRONewsLetter.php",
                "elements/PROPodcastSignUp/PROPodcastSignUp.php",
                "elements/PROProfitRoadmapSection/PROProfitRoadmapSection.php",
                "elements/PROSectionConnect/PROSectionConnect.php",
                "elements/PROTeamCards/PROTeamCards.php",
                "elements/PROTestBlock/PROTestBlock.php",
                "elements/PROTestimonials/PROTestimonials.php",
                "elements/PROTextSection/PROTextSection.php",
                "elements/PROTimeline/PROTimeline.php",
                "elements/PROTrustedBy/PROTrustedBy.php",
				"elements/PROWideImageSection/PROWideImageSection.php",
				"elements/PROWroteTheBook/PROWroteTheBook.php",
				"elements/PROSectionUnearthLoop/PROSectionUnearthLoop.php",
				"elements/PROTextMapSection/PROTextMapSection.php",
			];

			foreach ($elementsPaths as $elementPath) {
				$this->registerShortCodeElement($elementPath);
			}
		}
		private function registerShortCodeElement($path)
		{
			require_once($path);
			$objectName = pathinfo($path);
			$objectName = $objectName['filename'];
			$elementObj = new $objectName(['base' => '']);

			$shortcode = $this->generateShortcode($objectName);
			$this->registerShortCodeToVC($elementObj,
				$shortcode);
		}

		private function registerField($field_path)
		{
			require_once($field_path);
			$objectName = pathinfo($field_path);
			$objectName = $objectName['filename'];
			$fieldObj = new $objectName(['base' => '']);

			$field_name = $fieldObj->getFieldName();
			$js_file = $fieldObj->getJsPath();
			vc_add_shortcode_param($field_name, array($fieldObj, 'render'), $js_file);
		}

		/**
		 * @param $shortcode
		 * @param VC_Element_Abstract $elementObj
		 */
		private function registerShortCodeToVC($elementObj, $shortcode)
		{

			// Registers the shortcode in WordPress
			add_shortcode($shortcode, array($elementObj, 'render_shortcode'));
			add_action('init', array($elementObj, 'create_shortcode'), 999);
		}


		private function generateShortcode($objectName)
		{
			$shortCode = $objectName;

			$currentTheme = wp_get_theme();
			$themeName = $currentTheme->template;

			//Check if shortcode starts with theme name
			if (substr($objectName, 0, strlen($themeName)) === strtoupper($themeName)) {
				$themeName = ucwords(strtolower($themeName));
				$shortCode = substr($objectName, strlen($themeName));
			}

			//Check if shortcode starts with the 3 first letters of the theme name
			if (substr($objectName, 0, strlen(substr($themeName, 0, 3))) === strtoupper(substr($themeName, 0, 3))) {
				$themeName = ucwords(strtolower(substr($themeName, 0, 3)));
				$shortCode = substr($objectName, strlen(substr($themeName, 0, 3)));
			}

//			preg_match_all('/\B([A-Z])/', $shortCode, $matches);
//			if(count($matches) > 0){
//				$matches = $matches[0];
//			}

			$shortCode = preg_replace('/\B([A-Z])/', '_$1', $shortCode);

			$shortCode = strtolower($shortCode);
			$shortCode = "pro_" . $shortCode;
			return $shortCode;
		}


	}

}
new PROFITBakeryElements;
