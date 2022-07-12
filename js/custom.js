$(document).ready(function() {
  //hitung sub_total barang masuk
  //$('selector').val();
 
  //datetimepicker $('selector').Zebra_DatePicker();
  $('#tgl_masuk').Zebra_DatePicker();
  $('#tgl_keluar').Zebra_DatePicker();
  $('#tgl_pemesanan').Zebra_DatePicker();
  $('#tgl_permintaan').Zebra_DatePicker();

  //buat grafik
  $('table.highchart')
  .bind('highchartTable.beforeRender', function(event, highChartConfig) {
    highChartConfig.colors = ['#3D96AE'];
  })
  .highchartTable();
});
