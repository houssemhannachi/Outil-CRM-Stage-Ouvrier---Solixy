 $(document).ready(function(){
	$(document).on('click', '#checkAll', function() {          	
		$(".itemRow").prop("checked", this.checked);
	});	
	$(document).on('click', '.itemRow', function() {  	
		if ($('.itemRow:checked').length == $('.itemRow').length) {
			$('#checkAll').prop('checked', true);
		} else {
			$('#checkAll').prop('checked', false);
		}
	});  
	var count = $(".itemRow").length;
	$(document).on('click', '#addRows', function() { 
		count++;
		var htmlRows = '';
		htmlRows += '<tr>';
		htmlRows += '<td><div class="custom-control custom-checkbox"> <input type="checkbox" class="custom-control-input itemRow" id="itemRow_'+count+'"> <label class="custom-control-label" for="itemRow_'+count+'"></label> </div></td>';          
        
		htmlRows += '<td><input type="text" name="productName[]" id="productName_'+count+'" class="form-control" autocomplete="off"></td>';	
		htmlRows += '<td><input type="number" name="quantity[]" id="quantity_'+count+'" class="form-control quantity" autocomplete="off"></td>';   		
		htmlRows += '<td><input type="number" name="price[]" id="price_'+count+'" class="form-control price" autocomplete="off"></td>';		 
		htmlRows += '<td><input type="number" name="total[]" id="total_'+count+'" class="form-control total" autocomplete="off"></td>';          
		htmlRows += '</tr>';
		$('#invoiceItem').append(htmlRows);

	}); 
	$(document).on('click', '#removeRows', function(){
		$(".itemRow:checked").each(function() {
			$(this).closest('tr').remove();
		});
		$('#checkAll').prop('checked', false);
		calculateTotal();
	});		
	$(document).on('blur', "[id^=quantity_]", function(){
		calculateTotal();
	});	
	$(document).on('blur', "[id^=price_]", function(){
		calculateTotal();
	});
	$(document).on('click', function(){
		var baseht = $('#baseht').val();
		var remise = $('#remise').val();
		
		if(remise && baseht) {
			totalht = baseht-remise;			
			$('#totalht').val(totalht);
		} else {
			$('#totalht').val(totalht);
		}	
	});	
	$(document).on('blur', "#tauxtva", function(){		
		calculateTotal();
	});	
	
	$(document).on('click', '.deleteInvoice', function(){
		var id = $(this).attr("id");
		if(confirm("Are you sure you want to remove this?")){
			$.ajax({
				url:"action.php",
				method:"POST",
				dataType: "json",
				data:{id:id, action:'delete_invoice'},				
				success:function(response) {
					if(response.status == 1) {
						$('#'+id).closest("tr").remove();
					}
				}
			});
		} else {
			return false;
		}
	});
});	
function calculateTotal(){
	var baseht = 0;
	var totalht = 0; 
	$("[id^='price_']").each(function() {
		var id = $(this).attr('id');
		
		id = id.replace("price_",'');
		var price = $('#price_'+id).val();
		var quantity  = $('#quantity_'+id).val();
		if(!quantity) {
			quantity = 1;
		}
		var total = price*quantity;
		$('#total_'+id).val(parseFloat(total));
		baseht += total;
				
	});
	$('#baseht').val(parseFloat(baseht));
	var tauxtva = $("#tauxtva").val();
	var baseht = $('#baseht').val();
	var totalht = $('#totalht').val();
	var totalttc= $('#totalttc').val();


	if(baseht) {
		var totaltva = totalht*tauxtva/100;
		$('#totaltva').val(totaltva);
	
		
	}

	if(totaltva) {
		
		
		totalttc = parseFloat(totalht)+parseFloat(totaltva);
		$('#totalttc').val(totalttc);
	
		
	}
	
}

 