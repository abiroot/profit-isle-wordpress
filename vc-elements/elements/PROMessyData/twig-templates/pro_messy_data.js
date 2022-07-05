jQuery(document).ready(function () {
    jQuery('.text-slides').slick({
        arrows: false,
        centerMode: false,
        dots: true,
        autoplay: true,
        slide: "div"
    });
});

const ctx = document.getElementById('myChart');

setInterval(function () {
    var value1 = Math.floor((Math.random() * 10) + 1);
}, 3000);
let value1 = 5
let value2 = 10
let value3 = 7
const myChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
        datasets: [{
            label: '# of Votes',
            data: [value1, value2, value3],
            backgroundColor: [
                '#022B46',
                '#114364',
                '#0563a1',

            ],

        }]
    },
    options: {
        responsive: false
    }
});
const ctx2 = document.getElementById('myChart2');
const myChart2 = new Chart(ctx2, {
    type: 'doughnut',
    data: {
        datasets: [{
            label: '# of Votes',
            data: [12, 19, 5],
            backgroundColor: [
                '#022B46',
                '#114364',
                '#0563a1',

            ],

        }]
    },
    options: {
        responsive: false
    }
});
const ctx3 = document.getElementById('myChart3');
const myChart3 = new Chart(ctx3, {
    type: 'doughnut',
    data: {
        datasets: [{
            label: '# of Votes',
            data: [12, 19, 12],
            backgroundColor: [
                '#022B46',
                '#114364',
                '#0563a1',

            ],

        }]
    },
    options: {
        responsive: false
    }
});
const hrz = document.getElementById('horizontal');

const horizontal = new Chart(hrz, {
    type: 'bar',
    data: {
        labels: ['', '', '', ''],
        datasets: [{
            data: [15, 10, 7, 5],
            backgroundColor: [
                '#44BA9C',
            ],

        }]
    },
    options: {
        indexAxis: 'y',
        plugins: {
            legend: {
                display: false
            }
        },
        scales: {
            x: {
                ticks: {
                    display: false
                },
                grid: {
                    display: false,

                },
            },
            y: {
                grid: {
                    display: false,

                }
            }
        }
    }

});
//verticalchart
const vrt = document.getElementById('vertical');

const vertical = new Chart(vrt, {
    type: 'bar',
    data: {
        labels: ['', '', '', ''],
        datasets: [{
            data: [15, 10, 7, 5],
            backgroundColor: [
                '#44BA9C',
            ],

        }]
    },
    options: {
        plugins: {
            legend: {
                display: false
            }
        },
        scales: {
            x: {
                ticks: {
                    display: false
                },
                grid: {
                    display: false,

                },
            },
            y: {
                grid: {
                    display: false,
                },
                ticks: {
                    display: false
                },
            }
        }
    }

});

//vertical 2
const vrt2 = document.getElementById('vertical2');

const vertical2 = new Chart(vrt2, {
    type: 'bar',
    data: {
        labels: ['', '', '', ''],
        datasets: [{
            data: [10, 15, 11, 5],
            backgroundColor: [
                '#44BA9C',
            ],

        }]
    },
    options: {
        plugins: {
            legend: {
                display: false
            }
        },
        scales: {
            x: {
                ticks: {
                    display: false
                },
                grid: {
                    display: false,

                },
            },
            y: {
                grid: {
                    display: false,
                },
                ticks: {
                    display: false
                },
            }
        }
    }

});
const vrt3 = document.getElementById('vertical3');

const vertical3 = new Chart(vrt3, {
    type: 'bar',
    data: {
        labels: ['', '', '', ''],
        datasets: [{
            data: [10, 5, 11, 5],
            backgroundColor: [
                '#44BA9C',
            ],

        }]
    },
    options: {
        plugins: {
            legend: {
                display: false
            }
        },
        scales: {
            x: {
                ticks: {
                    display: false
                },
                grid: {
                    display: false,

                },
            },
            y: {
                grid: {
                    display: false,
                },
                ticks: {
                    display: false
                },
            }
        }
    }

});
// const vrt4 = document.getElementById('vertical4');
// const vertical4 = new Chart(vrt4, {
//     type: 'bar',
//     data: {
//         labels: ['', '', '', ''],
//         datasets: [{
//             data: [2, 5, 11, 5],
//             backgroundColor: [
//                 '#44BA9C',
//             ],
//
//         }]
//     },
//     options: {
//         plugins: {
//             legend: {
//                 display: false
//             }
//         },
//         scales: {
//             x: {
//                 ticks: {
//                     display: false
//                 },
//                 grid: {
//                     display: false,
//
//                 },
//             },
//             y: {
//                 grid: {
//                     display: false,
//                 },
//                 ticks: {
//                     display: false
//                 },
//             }
//         }
//     }
//
// });