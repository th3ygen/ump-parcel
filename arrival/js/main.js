/*
author: JOACHIM A/L AGOSTAIN CA20017
MODULE 2
*/


const active = document.querySelector('.active-input');
const arrival = document.querySelector('.arrival-input');
const collected = document.querySelector('.collected-input');

const ctx = document.getElementById('myChart').getContext('2d');
let myChart = new Chart(ctx, {
	type: 'pie',
	data: {
		labels: ['Active List', 'Arrivals', 'Collected'],
		datasets: [
			{
				label: '# of Votes',
				data: [0, 0, 0],
				backgroundColor: ['#fcda37', '#ff4500', '#7cfc00'],
				borderWidth: 1
				
			}
		]
	}
});

const updateChartValue = (input, dataOrder) => {
	input.addEventListener('change', e => {
		myChart.data.datasets[0].data[dataOrder] = e.target.value;
		myChart.update();
	});
};

updateChartValue(active, 0);
updateChartValue(arrival, 1);
updateChartValue(collected, 2);