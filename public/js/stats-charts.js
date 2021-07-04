//Stats Charts Generator 

'use strict';

var DIRPAGE = "http://" + document.location.hostname + "/lapechincha" + "/";

/* Random number generator for demo purpose */
var randomDataPoint = function () { return Math.round(Math.random() * 100) };


window.chartColors = {
	green: '#75c181',
	blue: '#5b99ea',
	gray: '#a9b5c9',
	text: '#252930',
	border: '#e7e9ed'
};

window.addEventListener('load', function () {


	SalesQntyChart()
	TimeByDepartmentChart()
	DistrictsRecheadChart()
	CustomerSalesChart()
	PieDepartmentTime()
	ProductsParticipation()
	ProductsSales()

});



//Bar Chart
function DistrictsRecheadChart() {
	$.ajax({
		url: DIRPAGE + 'admin/AjaxCharts',
		method: 'post',
		async: 'true',
		data: { 'chart': 'dist-qnty' },
		success: function (dados) {
			var res = JSON.parse(dados);
			console.log(res)

			var regionGraph = {
				type: 'bar',

				data: {
					datasets: [{
						label: 'Bairros',
						backgroundColor: "#f3d16b",
						hoverBackgroundColor: "#f3d16b",//
						data: Object.values(res),
					}],
					labels: Object.keys(res)
				},
				options: {
					responsive: true,
					aspectRatio: 1.5,
					legend: {
						position: 'bottom',
						align: 'end',
					},
					title: {

					},
					tooltips: {
						mode: 'index',
						intersect: false,
						titleMarginBottom: 10,
						bodySpacing: 10,
						xPadding: 16,
						yPadding: 16,
						borderColor: window.chartColors.border,
						borderWidth: 1,
						backgroundColor: '#fff',
						bodyFontColor: window.chartColors.text,
						titleFontColor: window.chartColors.text,

					},
					scales: {
						xAxes: [{
							display: true,
							gridLines: {
								drawBorder: false,
								color: window.chartColors.border,
							},

						}],
						yAxes: [{
							display: true,
							gridLines: {
								drawBorder: false,
								color: window.chartColors.borders,
							},


						}]
					}

				}
			}
			var regionbar = document.getElementById('districts-bar').getContext('2d');
			window.myBar = new Chart(regionbar, regionGraph);
		}
	});
}

function ProductsSales() {
	$.ajax({
		url: DIRPAGE + 'admin/AjaxCharts',
		method: 'post',
		async: 'true',
		data: { 'chart': 'prods-sales' },
		success: function (dados) {
			var res = JSON.parse(dados);
			console.log(res)

			var prodGraph = {
				type: 'bar',
			
				data: {
					labels: Object.keys(res),
					datasets: [{
						label: 'Código dos Produtos',
						backgroundColor: "#ffc107",
						borderColor: "#ffc107",
						borderWidth: 1,
						maxBarThickness: 20,
						
						data: Object.values(res)
					}]
				},
				options: {
					responsive: true,
					aspectRatio: 1.5,
					legend: {
						position: 'bottom',
						align: 'end',
					},
					title: {
			
					},
					tooltips: {
						mode: 'index',
						intersect: false,
						titleMarginBottom: 10,
						bodySpacing: 10,
						xPadding: 16,
						yPadding: 16,
						borderColor: window.chartColors.border,
						borderWidth: 1,
						backgroundColor: '#fff',
						bodyFontColor: window.chartColors.text,
						titleFontColor: window.chartColors.text,
			
					},
					scales: {
						xAxes: [{
							display: true,
							gridLines: {
								drawBorder: false,
								color: window.chartColors.border,
							},
			
						}],
						yAxes: [{
							display: true,
							gridLines: {
								drawBorder: false,
								color: window.chartColors.borders,
							},
							ticks: {
								beginAtZero: true
							},
			
							
						}]
					}
					
				}
			}
			var prodbar = document.getElementById('prod-sales-bar').getContext('2d');
			window.myBar = new Chart(prodbar, prodGraph);
		}
	});
}

function TimeByDepartmentChart() {
	$.ajax({
		url: DIRPAGE + 'admin/AjaxCharts',
		method: 'post',
		async: 'true',
		data: { 'chart': 'dep-time' },
		success: function (dados) {
			var res = JSON.parse(dados);
			console.log(res)

			var barChartConfig = {
				type: 'bar',
				data: {
					datasets: [{
						label: 'Setores',
						backgroundColor: "#f3d16b",
						hoverBackgroundColor: "#f3d16b",
						data: Object.values(res),
					}],
					labels: Object.keys(res)
				},
				options: {
					responsive: true,
					legend: {
						position: 'bottom',
						align: 'end',
						labels: {
							fontColor: '#212529',
						},
					},

					tooltips: {
						mode: 'index',
						intersect: false,
						titleMarginBottom: 10,
						bodySpacing: 10,
						xPadding: 16,
						yPadding: 16,
						borderColor: window.chartColors.border,
						borderWidth: 1,
						backgroundColor: '#fff',
						bodyFontColor: '#212529',
						titleFontColor: '#212529',
						callbacks: {
							label: function (tooltipItem, data) {
								return tooltipItem.value;
							}
						},


					},
					scales: {
						xAxes: [{
							display: true,
							gridLines: {
								drawBorder: false,
								color: window.chartColors.border,
							},
							ticks: {
								fontColor: "#212529",
							}
						}],
						yAxes: [{
							display: true,
							gridLines: {
								drawBorder: false,
								color: window.chartColors.borders,
							},
							ticks: {
								fontColor: "#212529",
								beginAtZero: true,
								userCallback: function (value, index, values) {
									return value;
								}
							},


						}]
					}

				}
			}

			var barChart = document.getElementById('canvas-bar').getContext('2d');
			window.myBar = new Chart(barChart, barChartConfig);
		}
	});
}

//Donut Charts
function ProductsParticipation() {
	$.ajax({
		url: DIRPAGE + 'admin/AjaxCharts',
		method: 'post',
		async: 'true',
		data: { 'chart': 'prods-participation' },
		success: function (dados) {
			var res = JSON.parse(dados);
			console.log(res)

			var doughnutChartConfig = {
				type: 'doughnut',
				data: {
					datasets: [{
						data: Object.values(res),
						backgroundColor: [
							"#ccccc0",
							window.chartColors.white,
							window.chartColors.gray,
			
						],
						label: 'Dataset 1'
					}],
					labels: Object.keys(res)
				},
				options: {
					responsive: true,
					legend: {
						display: true,
						position: 'bottom',
						align: 'center',
					},
			
					tooltips: {
						titleMarginBottom: 10,
						bodySpacing: 10,
						xPadding: 16,
						yPadding: 16,
						borderColor: window.chartColors.border,
						borderWidth: 1,
						backgroundColor: '#fff',
						bodyFontColor: window.chartColors.text,
						titleFontColor: window.chartColors.text,
						
						animation: {
							animateScale: true,
							animateRotate: true
						},
						
						/* Display % in tooltip - https://stackoverflow.com/questions/37257034/chart-js-2-0-doughnut-tooltip-percentages */
						callbacks: {
							label: function(tooltipItem, data) {
								//get the concerned dataset
								var dataset = data.datasets[tooltipItem.datasetIndex];
								//calculate the total of this data set
								var total = dataset.data.reduce(function(previousValue, currentValue, currentIndex, array) {
								return previousValue + currentValue;
								});
								//get the current items value
								var currentValue = dataset.data[tooltipItem.index];
								//calculate the precentage based on the total and current item, also this does a rough rounding to give a whole number
								var percentage = Math.floor(((currentValue/total) * 100)+0.5);
								
								return percentage + "%";
							},
						},
						
			
					},
				}
			};

			var productDonut = document.getElementById('prod-donut-chart').getContext('2d');
			window.myDoughnut = new Chart(productDonut, doughnutChartConfig);

		}
	});
}

//Pie Charts
function PieDepartmentTime() {
	$.ajax({
		url: DIRPAGE + 'admin/AjaxCharts',
		method: 'post',
		async: 'true',
		data: { 'chart': 'dep-time' },
		success: function (dados) {
			var res = JSON.parse(dados);
			console.log(res)

			var pieChartConfig = {
				type: 'pie',

				data: {
					datasets: [{
						data: Object.values(res),
						backgroundColor: [
							window.chartColors.white,
							window.chartColors.yellow,
							window.chartColors.gray,
			
						],
						label: 'Dataset 1'
					}],
					labels: Object.keys(res)
				},
				options: {
					responsive: true,
					legend: {
						display: true,
						position: 'bottom',
						align: 'center',
					},
			
					tooltips: {
						titleMarginBottom: 10,
						bodySpacing: 10,
						xPadding: 16,
						yPadding: 16,
						borderColor: window.chartColors.border,
						borderWidth: 1,
						backgroundColor: '#fff',
						bodyFontColor: window.chartColors.text,
						titleFontColor: window.chartColors.text,
						
						/* Display % in tooltip - https://stackoverflow.com/questions/37257034/chart-js-2-0-doughnut-tooltip-percentages */
						callbacks: {
							label: function(tooltipItem, data) {
								//get the concerned dataset
								var dataset = data.datasets[tooltipItem.datasetIndex];
								//calculate the total of this data set
								var total = dataset.data.reduce(function(previousValue, currentValue, currentIndex, array) {
								return previousValue + currentValue;
								});
								//get the current items value
								var currentValue = dataset.data[tooltipItem.index];
								//calculate the precentage based on the total and current item, also this does a rough rounding to give a whole number
								var percentage = Math.floor(((currentValue/total) * 100)+0.5);
								
								return percentage + "%";
							},
						},
						
			
					},
				}
			};

			var pieChart = document.getElementById('department-pie-time').getContext('2d');
			window.myBar = new Chart(pieChart, pieChartConfig);
		}
	});
}


//Line Chart
function CustomerSalesChart() {
	$.ajax({
		url: DIRPAGE + 'admin/AjaxCharts',
		method: 'post',
		async: 'true',
		data: { 'chart': 'customer-sales' },
		success: function (dados) {
			var res = JSON.parse(dados);
			console.log(res)
			var morePurchaseGraph = {
				type: 'line',
			
				data: {

					datasets: [{
						label: 'Crescimento das vendas',
						backgroundColor: "rgba(117,193,129,0.2)",
						borderColor: "#ffc107",
						data: Object.values(res),
					}],
					labels: Object.keys(res)
				},
				
				options: {
					responsive: true,	
					aspectRatio: 1.5,
					
					legend: {
						display: true,
						position: 'bottom',
						align: 'end',
					},
					
					title: {
						display: true,
						text: 'Chart.js Line Chart Example',
						
					}, 
					tooltips: {
						mode: 'index',
						intersect: false,
						titleMarginBottom: 10,
						bodySpacing: 10,
						xPadding: 16,
						yPadding: 16,
						borderColor: window.chartColors.border,
						borderWidth: 1,
						backgroundColor: '#fff',
						bodyFontColor: window.chartColors.text,
						titleFontColor: window.chartColors.text,
			
						callbacks: {
							//Ref: https://stackoverflow.com/questions/38800226/chart-js-add-commas-to-tooltip-and-y-axis
							label: function(tooltipItem, data) {
								if (parseInt(tooltipItem.value) >= 1000) {
									return "$" + tooltipItem.value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
								} else {
									return '$' + tooltipItem.value;
								}
							}
						},
			
					},
					hover: {
						mode: 'nearest',
						intersect: true
					},
					scales: {
						xAxes: [{
							display: true,
							gridLines: {
								drawBorder: false,
								color: window.chartColors.border,
							},
							scaleLabel: {
								display: false,
							
							}
						}],
						yAxes: [{
							display: true,
							gridLines: {
								drawBorder: false,
								color: window.chartColors.border,
							},
							scaleLabel: {
								display: false,
							},
							ticks: {
								beginAtZero: true,
								userCallback: function(value, index, values) {
									return '$' + value.toLocaleString();   //Ref: https://stackoverflow.com/questions/38800226/chart-js-add-commas-to-tooltip-and-y-axis
								}
							},
						}]
					}
				}
			};

			var morepurchase = document.getElementById('customer-sales').getContext('2d');
	window.myLine = new Chart(morepurchase, morePurchaseGraph);
		}
	});
}

function SalesQntyChart() {
	$.ajax({
		url: DIRPAGE + 'admin/AjaxCharts',
		method: 'post',
		async: 'true',
		data: { 'chart': 'sales-qnty' },
		success: function (dados) {
			var res = JSON.parse(dados);
			console.log(res)
			var lineChartConfig = {
				type: 'line',

				data: {

					datasets: [{
						label: 'Crescimento das vendas',
						backgroundColor: "rgba(117,193,129,0.2)",
						borderColor: "#ffc107",
						data: Object.values(res),
					}],
					labels: Object.keys(res)
				},
				options: {
					responsive: true,

					legend: {
						display: true,
						position: 'bottom',
						align: 'end',
						labels: {
							fontColor: '#212529',
						},
					},

					tooltips: {
						mode: 'index',
						intersect: false,
						titleMarginBottom: 10,
						bodySpacing: 10,
						xPadding: 16,
						yPadding: 16,
						borderColor: window.chartColors.border,
						borderWidth: 1,
						backgroundColor: '#fff',
						bodyFontColor: '#212529',
						titleFontColor: '#212529',
						callbacks: {
							label: function (tooltipItem, data) {
								return tooltipItem.value + '%';
							}
						},


					},
					hover: {
						mode: 'nearest',
						intersect: true
					},
					scales: {
						xAxes: [{
							display: true,
							gridLines: {
								drawBorder: false,
								color: window.chartColors.border,
							},
							scaleLabel: {
								display: false,

							},
							ticks: {
								fontColor: "#212529",
							}
						}],
						yAxes: [{
							display: true,
							gridLines: {
								drawBorder: false,
								color: window.chartColors.border,
							},
							scaleLabel: {
								display: false,
							},
							ticks: {
								fontColor: "#212529",
								beginAtZero: true,
								userCallback: function (value, index, values) {
									return value.toLocaleString();
								}
							},
						}]
					}
				}
			};

			var lineChart = document.getElementById('canvas-line').getContext('2d');
			window.myLine = new Chart(lineChart, lineChartConfig);
		}
	});

}



/* var lineChartConfig = {
	type: 'line',

	data: {
		
		datasets: [{
			label: 'Crescimento das vendas',
			backgroundColor: "rgba(117,193,129,0.2)", 
			borderColor: "#ffc107", 
			data: [1,2],
		}],
		labels: [10,10]
	},
	options: {
		responsive: true,		
		
		legend: {
			display: true,
			position: 'bottom',
			align: 'end',
			labels: {
			fontColor: '#212529',
			},
		},

		tooltips: {
			mode: 'index',
			intersect: false,
			titleMarginBottom: 10,
			bodySpacing: 10,
			xPadding: 16,
			yPadding: 16,
			borderColor: window.chartColors.border,
			borderWidth: 1,
			backgroundColor: '#fff',
			bodyFontColor: '#212529',
			titleFontColor: '#212529',
			callbacks: {
				label: function(tooltipItem, data) {	                 
					return tooltipItem.value + '%';   
				}
			},
		    

		},
		hover: {
			mode: 'nearest',
			intersect: true
		},
		scales: {
			xAxes: [{
				display: true,
				gridLines: {
					drawBorder: false,
					color: window.chartColors.border,
				},
				scaleLabel: {
					display: false,
				
				},
				ticks: {
					fontColor: "#212529",
				}
			}],
			yAxes: [{
				display: true,
				gridLines: {
					drawBorder: false,
					color: window.chartColors.border,
				},
				scaleLabel: {
					display: false,
				},
				ticks: {
					fontColor: "#212529",
					beginAtZero: true,
					userCallback: function(value, index, values) {
						return value.toLocaleString();  
					}
				},
			}]
		}
	}
}; */



//Bar Chart Demo

var barChartConfig = {
	type: 'bar',

	data: {
		labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
		datasets: [{
			label: 'Preparação',
			backgroundColor: "#f3d16b",
			hoverBackgroundColor: "#f3d16b",


			data: [
				randomDataPoint(),
				randomDataPoint(),
				randomDataPoint(),
				randomDataPoint(),
				randomDataPoint(),
				randomDataPoint(),
				randomDataPoint()
			]
		},
		{
			label: 'Conferência',
			backgroundColor: "#ffd901",
			hoverBackgroundColor: "#ffd901",


			data: [
				randomDataPoint(),
				randomDataPoint(),
				randomDataPoint(),
				randomDataPoint(),
				randomDataPoint(),
				randomDataPoint(),
				randomDataPoint()
			]
		},
		{
			label: 'Entrega',
			backgroundColor: "#ffbb01",
			hoverBackgroundColor: "#ffbb01",


			data: [
				randomDataPoint(),
				randomDataPoint(),
				randomDataPoint(),
				randomDataPoint(),
				randomDataPoint(),
				randomDataPoint(),
				randomDataPoint()
			]
		}
		]
	},
	options: {
		responsive: true,
		legend: {
			position: 'bottom',
			align: 'end',
			labels: {
				fontColor: '#212529',
			},
		},

		tooltips: {
			mode: 'index',
			intersect: false,
			titleMarginBottom: 10,
			bodySpacing: 10,
			xPadding: 16,
			yPadding: 16,
			borderColor: window.chartColors.border,
			borderWidth: 1,
			backgroundColor: '#fff',
			bodyFontColor: '#212529',
			titleFontColor: '#212529',
			callbacks: {
				label: function (tooltipItem, data) {
					return tooltipItem.value + '%';
				}
			},


		},
		scales: {
			xAxes: [{
				display: true,
				gridLines: {
					drawBorder: false,
					color: window.chartColors.border,
				},
				ticks: {
					fontColor: "#212529",
				}
			}],
			yAxes: [{
				display: true,
				gridLines: {
					drawBorder: false,
					color: window.chartColors.borders,
				},
				ticks: {
					fontColor: "#212529",
					beginAtZero: true,
					userCallback: function (value, index, values) {
						return value + '%';
					}
				},


			}]
		}

	}
}



// Pie Chart Demo

var pieChartConfig = {
	type: 'pie',
	data: {
		datasets: [{
			data: [
				randomDataPoint(),
				randomDataPoint(),
				randomDataPoint(),
			],
			backgroundColor: [
				window.chartColors.green,
				window.chartColors.blue,
				window.chartColors.gray,

			],
			label: 'Dataset 1'
		}],
		labels: [
			'Green',
			'Blue',
			'Gray',
		]
	},
	options: {
		responsive: true,
		legend: {
			display: true,
			position: 'bottom',
			align: 'center',
		},

		tooltips: {
			titleMarginBottom: 10,
			bodySpacing: 10,
			xPadding: 16,
			yPadding: 16,
			borderColor: window.chartColors.border,
			borderWidth: 1,
			backgroundColor: '#fff',
			bodyFontColor: '#212529',
			titleFontColor: '#212529',

			/* Display % in tooltip - https://stackoverflow.com/questions/37257034/chart-js-2-0-doughnut-tooltip-percentages */
			callbacks: {
				label: function (tooltipItem, data) {
					//get the concerned dataset
					var dataset = data.datasets[tooltipItem.datasetIndex];
					//calculate the total of this data set
					var total = dataset.data.reduce(function (previousValue, currentValue, currentIndex, array) {
						return previousValue + currentValue;
					});
					//get the current items value
					var currentValue = dataset.data[tooltipItem.index];
					//calculate the precentage based on the total and current item, also this does a rough rounding to give a whole number
					var percentage = Math.floor(((currentValue / total) * 100) + 0.5);

					return percentage + "%";
				},
			},


		},
	}
};


// Doughnut Chart Demo


var doughnutChartConfig = {
	type: 'doughnut',
	data: {
		datasets: [{
			data: [
				randomDataPoint(),
				randomDataPoint(),
				randomDataPoint(),
			],
			backgroundColor: [
				window.chartColors.green,
				window.chartColors.blue,
				window.chartColors.gray,

			],
			label: 'Dataset 1'
		}],
		labels: [
			'Green',
			'Blue',
			'Gray',
		]
	},
	options: {
		responsive: true,
		legend: {
			display: true,
			position: 'bottom',
			align: 'center',
		},

		tooltips: {
			titleMarginBottom: 10,
			bodySpacing: 10,
			xPadding: 16,
			yPadding: 16,
			borderColor: window.chartColors.border,
			borderWidth: 1,
			backgroundColor: '#fff',
			bodyFontColor: '#212529',
			titleFontColor: '#212529',

			animation: {
				animateScale: true,
				animateRotate: true
			},

			/* Display % in tooltip - https://stackoverflow.com/questions/37257034/chart-js-2-0-doughnut-tooltip-percentages */
			callbacks: {
				label: function (tooltipItem, data) {
					//get the concerned dataset
					var dataset = data.datasets[tooltipItem.datasetIndex];
					//calculate the total of this data set
					var total = dataset.data.reduce(function (previousValue, currentValue, currentIndex, array) {
						return previousValue + currentValue;
					});
					//get the current items value
					var currentValue = dataset.data[tooltipItem.index];
					//calculate the precentage based on the total and current item, also this does a rough rounding to give a whole number
					var percentage = Math.floor(((currentValue / total) * 100) + 0.5);

					return percentage + "%";
				},
			},


		},
	}
};



// Generate charts on load
/* window.addEventListener('load', function(){

	var lineChart = document.getElementById('chart-line').getContext('2d');
	window.myLine = new Chart(lineChart, lineChartConfig);

	var barChart = document.getElementById('chart-bar').getContext('2d');
	window.myBar = new Chart(barChart, barChartConfig);

	var pieChart = document.getElementById('chart-pie').getContext('2d');
	window.myPie = new Chart(pieChart, pieChartConfig);

	var doughnutChart = document.getElementById('chart-doughnut').getContext('2d');
	window.myDoughnut = new Chart(doughnutChart, doughnutChartConfig);


});	 */

