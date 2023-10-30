const ctx = document.getElementById('totalAnalyticsChart');

// Common set of months
const allMonths = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

// Prepare customer data with zeros for months without customer data
const customerMonthData = allMonths.map(month => customerMonths.includes(month) ? numOfCustomers[customerMonths.indexOf(month)] : 0);

// Prepare merchant data with zeros for months without merchant data
const merchantMonthData = allMonths.map(month => merchantMonths.includes(month) ? numOfMerchants[merchantMonths.indexOf(month)] : 0);

new Chart(ctx, {
  type: 'bar',
  data: {
    labels: allMonths, 
    datasets: [
      {
        label: '# of Customers',
        data: customerMonthData,
        backgroundColor: 'rgba(54, 162, 235, 0.2)',
        borderColor: 'rgba(54, 162, 235, 1)',
        borderWidth: 1
      },
      {
        label: '# of Merchants',
        data: merchantMonthData,
        backgroundColor: 'rgba(255, 99, 132, 0.2)',
        borderColor: 'rgba(255, 99, 132, 1)',
        borderWidth: 1
      }
    ]
  },
  options: {
    scales: {
      y: {
        beginAtZero: true
      }
    }
  }
});