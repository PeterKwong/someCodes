<template>

        <div class="chart-container" style="position: relative; height:30vh; width:80vw">
            <canvas id="myChart" height="60"></canvas>
        </div>


</template>


<script>

import Chart from 'chart.js'
	
export default{

	props: [ 'data', 'labels'],
	data(){
		return  {
			renderChart:'',
			chart:{
				    type: 'bar',
				    data: {
				        labels: [1,2,],
				        datasets: [{
				            label: 'Amount of Balance',
				            data: [100,200],
				            backgroundColor: [
				                'rgba(255, 99, 132, 0.2)',
				                'rgba(54, 162, 235, 0.2)',
				                'rgba(255, 206, 86, 0.2)',
				                'rgba(75, 192, 192, 0.2)',
				                'rgba(153, 102, 255, 0.2)',
				                'rgba(255, 159, 64, 0.2)'
				            ],
				            borderColor: [
				                'rgba(255,99,132,1)',
				                'rgba(54, 162, 235, 1)',
				                'rgba(255, 206, 86, 1)',
				                'rgba(75, 192, 192, 1)',
				                'rgba(153, 102, 255, 1)',
				                'rgba(255, 159, 64, 1)'
				            ],
				            borderWidth: 1
				        }]
				    },
				    options: {
				        scales: {
				            yAxes: [{
				                ticks: {
				                    beginAtZero:true
				                },
				                stacked: true
				            }],
				            xAxes: [{
				                stacked: true
				            }]
				        }
				    }
				}

		}
	},
	mounted(){

		this.load()

	},
	watch:{
		'data':'load',
	},
	methods:{
		load(){
			this.chart.data.labels = this.labels
			this.chart.data.datasets = this.data
			var ctx = document.getElementById("myChart").getContext('2d');
			var myChart = new Chart(ctx, this.chart );
		}
	},
	computed:{
		dataComputed(){
			return this.data
		}
	}


	
}
</script>
