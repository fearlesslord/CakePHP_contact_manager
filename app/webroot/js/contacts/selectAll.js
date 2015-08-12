$(function () {
  $('#select_all').on('click', function () {
    $(this).closest('fieldset').find(':checkbox').prop('checked', this.checked);
  });
});