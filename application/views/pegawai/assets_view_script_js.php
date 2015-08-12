
var oTable1 =
				$('#sample-table-2')
					//.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
						.dataTable( {
							bAutoWidth: false,
							"aoColumns": [
								{ "bSortable": false },
								null, null,null, null, null,
								{ "bSortable": false }
							],
							"aaSorting": [],

							//,
							//"sScrollY": "200px",
							//"bPaginate": false,

							//"sScrollX": "100%",
							//"sScrollXInner": "120%",
							//"bScrollCollapse": true,
							//Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
							//you may want to wrap the table inside a "div.dataTables_borderWrap" element

							//"iDisplayLength": 50
						} );
		/**
		 var tableTools = new $.fn.dataTable.TableTools( oTable1, {
					"sSwfPath": "../../copy_csv_xls_pdf.swf",
			        "buttons": [
			            "copy",
			            "csv",
			            "xls",
						"pdf",
			            "print"
			        ]
			    } );
		 $( tableTools.fnContainer() ).insertBefore('#sample-table-2');
		 */
