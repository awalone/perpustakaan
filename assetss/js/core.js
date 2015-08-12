$(document).ready(function() {

    $('#datepicker-example1').Zebra_DatePicker();

   $('#datepicker-example2').Zebra_DatePicker();

	$('#datepicker-example3').Zebra_DatePicker();
 
 

	$('#number').keyup(function(){
		if (this.value.match(/[^0-9]/g)) {
			this.value = this.value.replace(/[^0-9]/g,'');
		}
	})
	
	$('#fax').keyup(function(){
		if (this.value.match(/[^0-9]/g)) {
			this.value = this.value.replace(/[^0-9]/g,'');
		}
	})
	
	$('#kekayaan').keyup(function(){
		if (this.value.match(/[^0-9]/g)) {
			this.value = this.value.replace(/[^0-9]/g,'');
		}
	})
	
	$('#noKtp').keyup(function(){
		if (this.value.match(/[^0-9]/g)) {
			this.value = this.value.replace(/[^0-9]/g,'');
		}
	})
	
	$('#noHp').keyup(function(){
		if (this.value.match(/[^0-9]/g)) {
			this.value = this.value.replace(/[^0-9]/g,'');
		}
	})
	
	//$("#nomorRekomendasi").mask("999/DTRB/AA/99");
	//$("#nomorRekomendasi").mask("99/DTRB/aa/9999");
});