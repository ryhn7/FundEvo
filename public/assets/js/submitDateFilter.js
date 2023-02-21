const date = document.getElementById('date1');
const formFilter = document.getElementById('dateFilter');

date.addEventListener('change', () => {
    formFilter.submit();
})