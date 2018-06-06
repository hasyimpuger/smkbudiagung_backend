var table;
var baseUrl = $('meta[name="base_url"]').attr('content');
$(document).ready(function() {

    //datatables
    table = $('#table').DataTable({

      "processing": true,
      "serverSide": true,
      "order": [],

      "ajax": {
        "url": baseUrl + '/administrator/cms/sponsor/data',
        "type": "POST"
      },


      "columnDefs": [
        {
          "targets": [ 0 ],
          "orderable": false,
        },
      ],

    });


    function deleteRow() {
      table.row($(this).parents('tr')).remove().draw();
    }

    // ajax
    $('body').delegate('#delete', 'click', function(event) {
      var quest = window.confirm('Apakah anda yakin akan menghapus ?. jika yakin, klik OK untuk melanjutkan. data yang telah terhapus akan disaring di recycle bin. ');
      var id = $(this).data('id');
      if (quest) {
        $.ajax({
          url: baseUrl + '/administrator/cms/sponsor/delete',
          type: 'post',
          dataType: 'json',
          data: {id: id},
          success: function (respons) {
            deleteRow();
            alert(respons.msg);
          }
        });

      }
    });

    $('body').delegate('#edit', 'click', function(event) {
      var id = $(this).data('id');
      window.location = baseUrl + 'administrator/cms/sponsor/edit/' + id; 
    });

});
