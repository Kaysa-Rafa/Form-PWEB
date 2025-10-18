document.addEventListener('DOMContentLoaded', () => {
  if (typeof $ === 'undefined' || !$.fn.DataTable) return;
  $('#table').DataTable({
    dom: 'Bfrtip',
    buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
    paging: true
  });
});
