// JavaScript Document
		function cEle(name,app,value)
		{
			ele = document.createElement('input');
			ele.type = "hidden"; ele.name = name; ele.value = value;
			tab.appendChild(ele);
		}
		
		function createXML(tabel)
		{	//alert(tabel);
			ele = document.createElement('input');
			ele.type = "hidden";
			ele.id = "template";
			ele.name = "template";
			var tab = document.getElementById(tabel);
			alert(tab.rows.length);
			var f = new Array(tab.rows.length);
			for(i=1;i<tab.rows.length-1;i++)
			{	
				//alert(tab.rows.item(i).cells.item(0).innerHTML);
			//	alert('loop');
				child = tab.rows.item(i).cells.item(0).childNodes.item(0).innerHTML;
				form = tab.rows.item(i).cells.item(1).childNodes.item(0);
			//	alert('nama');
				cEle("f["+i+"][judul]",tab,child);
				//f[i]['nama'] = form.name; alert('nnn');
				cEle("f["+i+"][nama]",tab,form.name);
				//f[i]['id'] = form.id; 
				cEle("f["+i+"][id]",tab,form.id);
				//f[i]['tag'] = form.tagName;
				cEle("f["+i+"][tag]",tab,form.tagName);
				//f[i]['type'] = form.type; //alert('type');
				//f[i]['class'] = form.class;
				cEle("f["+i+"][class]",tab,form.className);
			//	alert('ff');
				switch(form.tagName)
				{
					case 'INPUT':
						//f[i]['lebar'] = form.size;
						cEle("f["+i+"][lebar]",tab,form.size);
						//f[i]['value'] = form.value;
						cEle("f["+i+"][type]",tab,form.type);
						cEle("f["+i+"][value]",tab,form.value);
					//	alert('caseinput');
						break;
					case 'SELECT':
						for(j=1;j<=form.childNodes.length;j++)
						{
							//f[i]['value'][j] = form.childNodes.item(j).nodeValue;
							cEle("f["+i+"][value]["+j+"]",tab,form.childNodes.item(j-1).innerHTML);
						//	alert(form.childNodes.item(j).innerHTML);
						}
						break;
					case 'TEXTAREA':
						//f[i]['lebar'] = form.cols;
						cEle("f["+i+"][lebar]",tab,form.cols);
						//f['tinggi'] = form.rows;
						cEle("f["+i+"][tinggi]",tab,form.rows);
						cEle("f["+i+"][value]",tab,form.value);
						break;
					case 'DIV':
						cEle("f["+i+"][type]",tab,form.childNodes.item(0).type);
						formDIV = form.getElementsByTagName('INPUT');
						cEle("f["+i+"][tag][0]",tab,form.tagName);
						cEle("f["+i+"][value][0]",tab,child);
						cEle("f["+i+"][nama][0]",tab,child);
						for(j=1;j<=formDIV.length;j++)
						{	
							cEle("f["+i+"][tag]["+j+"]",tab,formDIV.item(j-1).tagName);	
							cEle("f["+i+"][nama]["+j+"]",tab,formDIV.item(j-1).name);	
							cEle("f["+i+"][value]["+j+"]",tab,formDIV.item(j-1).value);
						}
						break;
				}
				//alert(child+'-'+tag+'-'+type+'-'+panjang);
			}
			//f['aa'] = Array('lebar','sad');
			//f[1] = 'asdsa';
			//ele.value = f;
			//tab.appendChild(ele);
			/*
			var http = new XMLHttpRequest();
			var url = "http://localhost/loko/eletter/buatXML/";
			var params = "lorem="+f+"&name=binny";
			alert('cicak');
			http.open("POST", url, true);
			
			//Send the proper header information along with the request
			http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			http.setRequestHeader("Content-length", params.length);
			http.setRequestHeader("Connection", "close");
			
			http.onreadystatechange = function() {//Call a function when the state changes.
				if(http.readyState == 4 && http.status == 200) {
					alert(http.responseText);
				}
			}
			http.send(params);
			*/
			//alert('cocok');
			return true;
		}
		function userCekbox(id,cek){
		//	alert(id);
			var anakmodul = document.getElementById(id).getElementsByTagName('li');
		//	var modul = document.getElementById(id);
			for($i=0; $i<anakmodul.length;$i++)
			{	//alert(id); 
				// anakmodul[$i].checked ="checked";
				if(cek == true)
				{
					document.getElementById(id+"_"+$i).checked = true;
				}
				else
				{
					document.getElementById(id+"_"+$i).checked = false;
				}
			}
			
		}

		function addDIV(idTab,type,klas,nama,id,value,enter)
		{	//alert(idTab);
			a = document.getElementById(idTab); 
			br = document.createElement('br');
			//root = document.createElement("div"); 
			//root.setAttribute("class",klas);
			switch (type)
			{
				case 'txtBox':
							element = document.createElement('input');
							element.type = 'text';
							element.name = nama;
							element.value= value;
							element.id = id;
							element.setAttribute('class',klas);
								break;
				case 'href':
							element = document.createElement('a');
							element.setAttribute('class',klas);
							element.setAttribute('onclick',"parentNode.remove()");
							element.innerHTML = value;
								break;
				case 'hidden':
							element = document.createElement('input');
							element.type = 'hidden';
							element.name = nama;
							element.value= value;
							element.id= id;
							element.setAttribute('class',klas);
								break;
				case 'div':
							element = document.createElement('div');
							element.setAttribute('class',klas);
							element.innerHTML = value;
							element.id = id;
							break;
				case 'radio':
							element = document.createElement('input');
							element.type = 'radio';
							element.name = nama;
							element.value= value;
							element.setAttribute('class',klas);
							if(id == 'checked')
								element.setAttribute('checked','checked');
							break;
							element.setAttribute('href',value);
										
							
			}
			//root.innerHTML = isi;
			a.appendChild(element);
			if(enter == true)
				a.appendChild(br);
			
		}
        function addRow(ele,tableID,type) {
// alert('aa');
			eleme = document.getElementById(ele); //x = document.createElement("div"); x.innerHTML = "aaaa";
			//eleme.getElementsByName('radio');
			//alert(eleme.length);
			//alert(eleme.childNodes.item(0).tagName);
			elem = eleme.getElementsByTagName('input');
			//alert(elem.item(0).type);
            var table = document.getElementById(tableID);
  
            var rowCount = table.rows.length;

            var row = table.insertRow(rowCount-1);
 
            var cell1 = row.insertCell(0);
   
   			var element1 = document.createElement("label");
			
            element1.innerHTML = elem.item(0).value;
			element1.setAttribute('style',"padding-left:10px");
            cell1.appendChild(element1);
 			
			var host = window.location.host;
			var path = window.location.pathname;
			path = path.split('/');
			host = host+'/'+path[1];
			//alert(host);
           // var cell2 = row.insertCell(1);
            //cell2.innerHTML = rowCount + 1;
			var idtgl = null; var inc = 0; 
			while(idtgl == null)
			{	
				inc++;
				if(document.getElementById('tgl'+String(inc)));
				else
					idtgl = 'tgl'+String(inc);
			}
			cell2 = row.insertCell(1);
 			switch (type)
			{
				case "txtBox":
						element2 = document.createElement("input");
            			element2.type = "text";
						element2.size = elem.item(1).value;
						element2.value = elem.item(2).value;
						element2.setAttribute('disabled','');
						cell2.appendChild(element2);
						break;
				case "list": 
						element2 = document.createElement("select");
						opsi = document.getElementsByName('opsi');
						for(i=0;i<opsi.length;i++)
						{	
							opt = document.createElement("option");
							opt.innerHTML = opsi.item(i).value;
							element2.appendChild(opt);
						}
						cell2.appendChild(element2);
						break;
				case "txtArea":
						element2 = document.createElement("textarea");
						element2.cols = elem.item(1).value;
						element2.rows = elem.item(2).value;
						element2.setAttribute('disabled','');
						textarea = eleme.getElementsByTagName('textarea');
						element2.innerHTML = textarea.item(0).value;
						cell2.appendChild(element2);
						break;
				case "date":
						element2 = document.createElement("input");
            			element2.type = "text";
						element2.setAttribute('disabled','');
						element2.id = idtgl;

						var script = document.createElement('script'); 
						script.type = 'text/javascript'; 
						script.innerHTML = "$(function() {  $(\"#"+idtgl+"\").datepicker({dateFormat: 'DD, d MM yy', showOn: 'button', buttonImage: 'http://"+host+"/css/calendar.gif', buttonImageOnly: true, altField: '#alternate', altFormat: 'DD, d MM, yy'}); $(\"#locale\").change(function() { $(\"#jam\").value($(this).val()); 	}); }); ";
						cell2.appendChild(element2);
						cell2.appendChild(script); 	
						break;
				case "cekBox":
            			cekbox = document.getElementsByName('cekbox');
						textDiv = document.createElement('div');
						for(i=0;i<cekbox.length;i++)
						{							
							element2 = document.createElement("input");
							element2.type = "checkbox";
							element2.name = cekbox.item(i).value;
							element2.value = cekbox.item(i).value;
							//text = document.createElement('div');
							//text.appendChild(element2);
							//text.appendChild(document.createTextNode(cekbox.item(i).value));							
							textDiv.appendChild(element2);
							textDiv.appendChild(document.createTextNode(cekbox.item(i).value));
							//cell2.appendChild(text);
							bro = document.createElement('br');
							textDiv.appendChild(bro);
						}
						cell2.appendChild(textDiv);
						break;
				case "radio":
            			radio = document.getElementsByName('radio');
						textDiv = document.createElement('div');
						for(i=0;i<radio.length;i++)
						{							
							element2 = document.createElement("input");
							element2.type = "radio";
							element2.name = elem.item(0).value;
							element2.value = radio.item(i).value;
							//text = document.createElement('div');
							//text.appendChild(element2);
							//text.appendChild(document.createTextNode(radio.item(i).value));							
							//cell2.appendChild(text);
							textDiv.appendChild(element2);
							textDiv.appendChild(document.createTextNode(radio.item(i).value));
							//bros = document.createElement('br');
							//textDiv.appendChild(bros);

						}
						cell2.appendChild(textDiv);
						break;
												
            			
			}
 
        }
		
		var selected = null;
		var row_akhir = null;
		var over_akhir = null;
		function selectTabel(id)
		{
			elem = document.getElementById(id);
			attr_id = elem.attributes['id'].value;
			
			blokTabel(elem);
			//alert(id);
			if(selected != null )//&& selected != attr_id)
			{	var mulai = selected.split("_");
				var sampai = attr_id.split("_");
				var mulai_awal = parseInt(mulai[0]);
				var mulai_akhir = parseInt(mulai[1]);
				var sampai_awal = parseInt(sampai[0]);
				var sampai_akhir = parseInt(sampai[1]);
				//alert(mulai[1]+":"+sampai[1]);
				for(row=mulai_awal; row <= sampai_awal; row++ )
				{
					for(col=mulai_akhir; col<= sampai_akhir; col++)
					{	elem_x = document.getElementById(row+'_'+col);
						if(elem_x != null)
						{
							if(selected != (row+'_'+col) && elem_x.attributes['selected'].value == 'no')
								blokTabel(elem_x);
						}
					}
				}

				if(row_akhir != null)
				{	
					cell_akhir = row_akhir.split("_");
					if(sampai_awal < cell_akhir[0] )//&& sampai[0] >= mulai[0])
					{	//alert('baris')	;
						for(row = parseInt(sampai_awal)+1; row <= cell_akhir[0]; row++)
						{ 	
							if(row >= mulai_awal)
							{
								for(col = mulai_akhir; col <= cell_akhir[1]; col++)
								{	//alert(col);
									elem_y = document.getElementById(row+'_'+col);
									if(elem_y != null)
										blokTabel(elem_y);
								}
							}
						}
						ca = sampai_awal;
					}
					else if(sampai_awal > cell_akhir[0])
						ca = cell_akhir[0]; 
					else
						ca = sampai_awal;
					///////////////////////////////////////
					if(sampai_akhir < cell_akhir[1] )//&& sampai[1] >= mulai[1])
					{	//alert('kolom');
						for(row=mulai_awal; row <= ca; row++)
						{	//alert(row+":"+mulai[1]);
							for(col=parseInt(sampai_akhir)+1; col <= cell_akhir[1]; col++)
							{	///alert(col);
								elem_y = document.getElementById(row+'_'+col);
								if(elem_y != null)
								{
									if(col >= mulai_akhir)
										blokTabel(elem_y);
								}
							}
						}
					}

				}
				//else if()
				row_akhir = id;


				if(sampai_akhir < mulai_akhir || sampai_awal < mulai_awal)
				{ 	//alert('ggg'+selected);
					obj_sel = document.getElementById(selected);
					if(obj_sel.attributes['selected'].value == 'yes')
						blokTabel(obj_sel);
					//else
						blokTabel(elem);
					selected = null; 
					row_akhir = null; 
				} 
				else if (selected == attr_id)
				{//	alert('vvvv');
					selected = null;
					row_akhir = null;
				}
				
			//alert(selected);
			}
			else if (selected == attr_id)
			{
				selected = null;
				row_akhir = null;
			}
			else
				selected = elem.attributes['id'].value;
			
				
			//alert(elem.attributes['class'].value);
		}

		function blokTabel(elem)
		{
			if (elem.attributes['selected'].value == 'no')
			{	
				elem.attributes['class'].value = 'backKuning';
				elem.attributes['selected'].value = 'yes';
				
			}			
			else
			{
				elem.attributes['class'].value = 'xx';
				elem.attributes['selected'].value = 'no';
			}
		}
		
		function mouseoverTabel(id)
		{	var elem = document.getElementById(id);
			var attr_id = elem.attributes['id'].value;
			var mulai = selected.split("_");
			var sampai = attr_id.split("_");
			var sampai_awal = parseInt(sampai[0]);
			var sampai_akhir = parseInt(sampai[1]);
			var mulai_awal = parseInt(mulai[0]);
			var mulai_akhir = parseInt(mulai[1]);
			
			if(over_akhir != null)
			{	//alert(over_akhir);
				o_akhir = over_akhir.split("_");
				for(row=mulai_awal; row <= o_akhir[0]; row++ )
				{
					for(col=mulai_akhir; col<= o_akhir[1]; col++)
					{	elem_x = document.getElementById(row+'_'+col);
						if(elem_x != null)
						{
							if(elem_x.attributes['selected'].value == 'yes')
								elem_x.attributes['class'].value = 'backKuning';
							else
								elem_x.attributes['class'].value = 'xx';
						}
					}
				}
			}
			for(row=mulai_awal; row <= sampai_awal; row++ )
			{	
				for(col=mulai_akhir; col<= sampai_akhir; col++)
				{	
					elem_x = document.getElementById(row+'_'+col);
					if(elem_x != null)
					{
						if(elem_x.attributes['selected'].value == 'yes')
							elem_x.attributes['class'].value = 'backKuning';
						else
							elem_x.attributes['class'].value = 'backGray';
					}
				}
			}
			over_akhir = attr_id;
			//if(elem.attributes['class'].value == 'backGray')
		}

		function buatTabel(baris,kolom,id)
		{	var hit = 0, hot = 0;
			var bar = "", kol = "";
			selected = null; row_akhir = null;
			for(i=0; i< baris; i++)
			{	hot++; hit = 0;
				kol = kol + "<tr id=r_"+hot+" class='rowHeader' name='rowHeader'>";
				for(j=0; j < kolom; j++)
				{	hit++;
					bar = bar + "<td width=100 height=10 name=kolomtabel class=xx selected=no id="+hot+"_"+hit+" onclick=selectTabel(this.id) onmouseover=\"mouseoverTabel(this.id);\" onmouseout=\"mouseoutTabel(this.id);\">&nbsp;&nbsp;&nbsp;&nbsp;</td>";
				}
				kol = kol + bar + "</tr>";
				bar = "";
			}
			var tabel = "<table border=1 id=TabelDesain>"+kol+"</table>";
			//alert(tabel);
			simpan = document.getElementById(id);
			simpan.innerHTML = tabel;
		}
		
		function mergeTabel()
		{
			if(selected != null)
			{
				var cellawal = document.getElementById(selected);
				var cellakhir = document.getElementById(row_akhir);
				var cell_1 = selected.split('_');
				var cell_2 = row_akhir.split('_');
				var cell_1_awal = parseInt(cell_1[0])
				var cell_1_akhir = parseInt(cell_1[1])
				var cell_2_awal = parseInt(cell_2[0])
				var cell_2_akhir = parseInt(cell_2[1])
				if(cell_1_awal < cell_2_awal)
				{	
					rowspan = (cell_2_awal - cell_1_awal) + 1;
					////// Memasang attribute rowspan
					cellawal.setAttribute('rowspan',rowspan);
				}
				
				if(cell_1_akhir < cell_2_akhir)
				{	
					colspan = (cell_2_akhir - cell_1_akhir) + 1;
					////// Memasang attribute colspan
					cellawal.setAttribute('colspan',colspan);
				}
		
				for(i=cell_1_awal; i<=cell_2_awal; i++)
				{	
					row = document.getElementById("r_"+i);
					for(j=cell_1_akhir; j<=cell_2_akhir; j++)
					{	elem = document.getElementById(i+'_'+j);
						///alert(selected);
						if(i+'_'+j != selected && elem != null)
						{ //alert(i+'_'+j+' terhapus');
							row.removeChild(elem);
						}
					}
				}
				blokTabel(cellawal);
				selected = null;
				row_akhir = null;
			}
						
			//row = document.getElementById('r_2');
			//row.removeChild(document.getElementById('2_1'));
		}
		
		function insertPropTabel(ele,jns)
		{	//alert(selected);
			if(selected != null)
			{	
				elem = document.getElementById(ele);
				
				cell = document.getElementById(selected);
				
				switch (jns)
				{
					case "text":
						input = elem.getElementsByTagName('input');
						value = input.item(0).value;
						break;
					case "fieldDB":
						input = elem.getElementsByTagName('select');
						value = '@'+input.item(0).value;
						break;
					case "link": //alert('aaa');
						input = elem.getElementsByTagName('input');
						option = elem.getElementsByTagName('select');
						label = input.item(0).value;
						target = option.item(0).value;
						href = option.item(1).value;
						send = '@'+option.item(2).value;
						value = "<a t ="+target+" h ="+href+" s="+send+" l = "+label+">"+label+"</a>";
					case "linkMenu":
						input = elem.getElementsByTagName('input');
						option = elem.getElementsByTagName('select');
						
						label = input.item(0).value;
						target = option.item(0).value;
						type = option.item(1).value;
						selfHref = option.item(2).value;
						otherHref = input.item(1).value;
						if(type == 'self')
							href = selfHref;
						else if(type == 'other')
							href = otherHref;
						else
							href = 'none';
							
						value = "<a target ="+target+" h ="+href+"  >"+label+"</a>";
						
				}
				
				cell.innerHTML = cell.innerHTML+" "+value;
				//return(true);
			}
		}
		
		function dropIt(theEvent) {
			//get a reference to the element being dragged
			var theData = theEvent.dataTransfer.getData("Text");
			//get the element
			var theDraggedElement = document.getElementById(theData);
			//add it to the drop element
			theEvent.target.appendChild(theDraggedElement);
			//instruct the browser to allow the drop
			theEvent.preventDefault();
		}
		
		//function called when drag starts
		function dragIt(theEvent) {
			//tell the browser what to drag
			theEvent.dataTransfer.setData("Text", theEvent.target.id);
		}
		
		function popupHal(hal,lempar)
		{	
			w = 400; h=320;
			var div = document.createElement("div");
			a = document.getElementById("yyy");
			div.setAttribute("class","popup");
			div.setAttribute("id","popup");
			//div.setAttribute("ondrop","dropIt(event)");
			//div.setAttribute("ondragover","event.preventDefault()");
			//div.innerHTML = 'asdasdsda';
			//alert(hal);

			var send = 'lempar='+lempar;
			 var xmlhttp;
			
			 if (window.XMLHttpRequest)
			   {// code for IE7+, Firefox, Chrome, Opera, Safari
			   xmlhttp=new XMLHttpRequest();
			   }
			 else
			   {// code for IE6, IE5
			   xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			   }
			 xmlhttp.onreadystatechange=function()
			   {
			   if (xmlhttp.readyState==4 && xmlhttp.status==200)
				 {
				 divisi=xmlhttp.responseText; 
				 }
			   } 
			 xmlhttp.open("POST",hal,false);
			xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");	 
			 xmlhttp.send(send);
 			divclose = "<div class=closepopup><div onclick=deleteElement('yyy')>x</div></div><br><div class=isipopup id=isipopup>";
			
			 div.innerHTML = divclose + divisi;
			
				a.appendChild(div);

			  var screenSize = getViewportSize();
			  var screenWidth = screenSize.width;
			  var screenHeight = screenSize.height;

			  popup = document.getElementById("popup");
			  popup.style.width = String(w)+'px';
			  popup.style.height = String(h)+'px'; 
			  
			  var elementSize = getElementSize(popup);
			  var elementWidth = elementSize.width;
			  var elementHeight = elementSize.height;
			
			 // Calculate the centering positions...
			  //var xPos = (screenWidth - elementWidth) / 5 ;
			  var xPos = 20;
			  var yPos = (screenHeight - elementHeight) / 2;
			
			 // Position the element...
			  popup.style.position = 'fixed';
			  popup.style.right = xPos + 'px';
			  popup.style.top = yPos + 'px';
			  
			  
			  isipopup = document.getElementById("isipopup");
			  isipopup.style.height = String(h-40)+'px';
			
			$(function() {
			$( "#popup" ).draggable();
			});

		}
		
		function addPropTabel(jns,w,h,data)
		{	
			//var row = document.getElementById(id);
			var div = document.createElement("div");
			a = document.getElementById("yyy");
			
			div.setAttribute("class","popup");
			div.setAttribute("id","popup");
			div.setAttribute("ondrop","dropIt(event)");
			div.setAttribute("ondragover","event.preventDefault()");
			switch(jns)
			{
				case "text":
					divisi = "<div class=lblpopup>Text</div> = <input type=text autofocus>";
					break;
				case "fieldDB":
					divisi = "<div class=lblpopup>Pilih Field</div> = <select>"+data+"</select>";
					break;
				case "fieldSQL":
					divisi = "<div class=lblpopup>Query SQL</div> = <textarea cols=30 rows=5></textarea>";
					break;
				case "link":
					divisi = "<div class=lblpopup>Label </div> = <input type=text autofocus><br><div class=lblpopup>Target</div> = <select><option>_self</option><option>_blank</option><option>_parent</option><option>_top</option></select><br><div class=lblpopup>href</div> = "+data[0]+"<br><div class=lblpopup>Send Data</div> = <select><option></option>"+data[1]+"</select>";
					break;
				case "linkMenu":
					divisi = "<div class=lblpopup>Label </div> = <input type=text autofocus><br><div class=lblpopup>Target</div> = <select><option>_self</option><option>_blank</option><option>_parent</option><option>_top</option></select><br><div class=lblpopup>Type</div> = <select><option>none</option><option>self</option><option>other</option></select><br><div class=lblpopup>Self href</div> = "+data[0]+"<br><div class=lblpopup>Other href</div> = <input type=text>";
					break;
			}
		//	div.style.float("left");
			
			divclose = "<div class=closepopup><div onclick=deleteElement('yyy')>x</div></div><br><div class=isipopup id=isipopup>";
			div.innerHTML = divclose + divisi + "<div><br><input type=button value=OK onclick=insertPropTabel('isipopup','"+jns+"');deleteElement('yyy')></div>";
			
			a.appendChild(div);
			
			  var screenSize = getViewportSize();
			  var screenWidth = screenSize.width;
			  var screenHeight = screenSize.height;

			  popup = document.getElementById("popup");
			  popup.style.width = String(w)+'px';
			  popup.style.height = String(h)+'px'; 
			  
			  var elementSize = getElementSize(popup);
			  var elementWidth = elementSize.width;
			  var elementHeight = elementSize.height;
			
			 // Calculate the centering positions...
			  var xPos = (screenWidth - elementWidth) / 2;
			  var yPos = (screenHeight - elementHeight) / 2;
			
			 // Position the element...
			  popup.style.position = 'fixed';
			  popup.style.left = xPos + 'px';
			  popup.style.top = yPos + 'px';
			  
			  
			  isipopup = document.getElementById("isipopup");
			  isipopup.style.height = String(h-40)+'px';
		}
 
 		function buatForm(jns,w,h)
		{
			var div = document.createElement("div");
			a = document.getElementById("yyy");
			
			div.setAttribute("class","popup");
			div.setAttribute("id","popup");
		//	div.style.float("left");
			divclose = "<div class=closepopup><div onclick=deleteElement('yyy')>x</div></div><br><div class=isipopup id=isipopup>";
			switch (jns)
			{
				case "txtBox": 
					divisi = "<div class=lblpopup>Label</div> = <input type=text><br><div class=lblpopup>Panjang</div> = <input type=text size=1><br><div class=lblpopup>Value</div> = <input type=text>";
					break;
				case "list": 
					divisi = "<div class=lblpopup>Label</div> =<input type=text><br> <div id=option style=\"float:left\"><div class=lblpopup>Option</div> =<input type=text name=opsi><br><input type=text class=floatRight name=opsi><div class=floatRight>=</div><br></div><br><div style=\"padding:10px 0 0 80px\"><div onclick=\"addDIV('option','txtBox','floatRight','opsi','',false);addDIV('option','div','floatRight','',' = ',true);\" class=tbhOpsi alt=Tambah Opsi> + </div></div><br>"; 
					break;
				case "txtArea":
					divisi = "<div class=lblpopup>Label = </div> <input type=text><br><div class=lblpopup>Lebar = </div> <input type=text size=1><br><div class=lblpopup>Tinggi = </div> <input type=text size=1><br> <div class=lblpopup>Value = </div><textarea cols=20 rows=10></textarea>";
					break;
				case "date":
					divisi = "<div class=lblpopup>Label = </div> <input type=text><br>";
					break;
				case "cekBox":
					divisi = "<div class=lblpopup>Label </div> =<input type=text><br><div id=cekBox><div class=lblpopup>Item </div> =<input type=text name=cekbox><br><input type=text class=floatRight  name=cekbox><div class=floatRight>=</div><br></div> <div style=\"padding:10px 0 0 80px\"><div onclick=\"addDIV('cekBox','txtBox','floatRight','cekbox','',false);addDIV('cekBox','div','floatRight','',' = ',true);\" class=tbhOpsi alt=Tambah Opsi> + </div></div><br>";
					break;
				case "radio":
					divisi = "<div class=lblpopup>Label </div> =<input type=text><br><div id=radio><div class=lblpopup>Option </div> =<input type=text name=radio><br><input type=text class=floatRight  name=radio><div class=floatRight>=</div><br></div> <div style=\"padding:10px 0 0 80px\"><div onclick=\"addDIV('radio','txtBox','floatRight','radio','',false);addDIV('radio','div','floatRight','',' = ',true);\" class=tbhOpsi alt=Tambah Opsi> + </div></div><br>";
					break;
				
			}	
			div.innerHTML = divclose + divisi + "<div><br><input type=button value=OK onclick=addRow('isipopup','tab','"+jns+"');deleteElement('yyy')></div>";
			a.appendChild(div);
			
			  var screenSize = getViewportSize();
			  var screenWidth = screenSize.width;
			  var screenHeight = screenSize.height;

			  popup = document.getElementById("popup");
			  popup.style.width = String(w)+'px';
			  popup.style.height = String(h)+'px'; 
			  
			  var elementSize = getElementSize(popup);
			  var elementWidth = elementSize.width;
			  var elementHeight = elementSize.height;
			
			 // Calculate the centering positions...
			  var xPos = (screenWidth - elementWidth) / 2;
			  var yPos = (screenHeight - elementHeight) / 2;
			
			 // Position the element...
			  popup.style.position = 'fixed';
			  popup.style.left = xPos + 'px';
			  popup.style.top = yPos + 'px';
			  
			  
			  isipopup = document.getElementById("isipopup");
			  isipopup.style.height = String(h-40)+'px';
			
		}
 
        function deleteRow(tableID) {
            try {
            var table = document.getElementById(tableID);
            var rowCount = table.rows.length;
 
            for(var i=0; i<rowCount; i++) {
                var row = table.rows[i];
                var chkbox = row.cells[0].childNodes[0];
                if(null != chkbox && true == chkbox.checked) {
                    table.deleteRow(i);
                    rowCount--;
                    i--;
                }
 
            }
            }catch(e) {
                alert(e);
            }
        }
		function deleteElement(id)
		{	
			el = document.getElementById(id);
			olddiv = document.getElementById('popup');
			el.removeChild(olddiv);
		}
			
	 function getElementSize(elementRef)
	 {
			  if ( typeof elementRef == 'string' )
			   elementRef = document.getElementById(elementRef);
			
			 var widthValue = 0;
			  var heightValue = 0;
			
			 if ( elementRef.offsetWidth )
			   widthValue = elementRef.offsetWidth;
			  else if ( (document.layers) && (elementRef.document) && (elementRef.document.width) )
			   widthValue = elementRef.document.width;
			  else if ( (elementRef.clip) && (elementRef.clip.width) )
			   widthValue = elementRef.clip.width;
			  else if ( (elementRef.style) && (elementRef.style.width) )
			   widthValue = elementRef.style.width;
			  else if ( (elementRef.style) && (elementRef.style.pixelWidth) )
			   widthValue = elementRef.style.pixelWidth;
			
			 widthValue = parseInt(widthValue);
			  if ( (isNaN(widthValue) == true) || (widthValue < 0) )
			   widthValue = 0;
			
			 if ( elementRef.offsetHeight )
			   heightValue = elementRef.offsetHeight;
			  else if ( (document.layers) && (elementRef.document) && (elementRef.document.height) )
			   heightValue = elementRef.document.height;
			  else if ( (elementRef.clip) && (elementRef.clip.height) )
			   heightValue = elementRef.clip.height;
			  else if ( (elementRef.style) && (elementRef.style.height) )
			   heightValue = elementRef.style.height;
			  else if ( (elementRef.style) && (elementRef.style.pixelHeight) )
			   heightValue = elementRef.style.pixelHeight;
			
			 heightValue = parseInt(heightValue);
			  if ( (isNaN(heightValue) == true) || (heightValue < 0) )
			   heightValue = 0;
			
			 return { width:widthValue, height:heightValue }
	 }


	 function getViewportSize() 
	 {
	  var heightValue = 0;
	  widthValue = 0;
	
	 if ( window.innerHeight ) 
	  {
	   heightValue = window.innerHeight;
	   widthValue = window.innerWidth;
	  } 
	  else if ( (document.documentElement) && (document.documentElement.clientHeight) ) 
	  {
	   heightValue = document.documentElement.clientHeight;
	   widthValue = document.documentElement.clientWidth;
	  }
	  else if ( (document.body) && (document.body.clientHeight) ) 
	  {
	   heightValue = document.body.clientHeight;
	   widthValue = document.body.clientWidth;
	  }
	
	 return { width: parseInt(widthValue, 10), height: parseInt(heightValue, 10) };
	 }

	function convertCurPost(awal,akhir)
	{	
		for(i=awal; i<=akhir;i++)
		{
			node = document.getElementsByName('post['+i+']');
			nilai = node.item(0).value;
			if(nilai.indexOf('.') > 0)
			{	
				var words = Array();
				words = nilai.split(".");
				var wordsgabung = words.join('');
				nilai = String(wordsgabung);
				node.item(0).value = wordsgabung;
				//alert(wordsgabung);
			}
		}
		return true;
	}

	function Currency(nil)
	{	
		var huruf = Array();
		var nilai = nil;
		if(nilai == '')
			nilai = '0';
		else if(nilai[0] == '0' && nilai.length > 1)
			nilai = nilai.replace('0','');
		if(nilai.indexOf('.') > 0)
		{	//alert(nilai.indexOf(','));
			var words = Array();
			words = nilai.split(".");
			//alert(words);
			var wordsgabung = words.join('');
			nilai = String(wordsgabung);
			//node.item(0).value = wordsgabung;
			//alert(wordsgabung);
		}
		//alert(nilai.length);
		if(nilai.length > 3)
		{
			bagi = nilai.length / 3;
			sisa = nilai.length % 3;
			//alert(bagi);
			start = 0; panjang = 3;
			fori = 0; 
			if(sisa !== 0)
			{	panjang = sisa;
				huruf[0] = nilai.substr(start,panjang);
				//alert(huruf[0]);
				start = start + panjang; panjang = 3;
				fori = 1; 
				
			}
			
			for(i=fori; i < bagi; i++)
			{
				huruf[i] = nilai.substr(start,panjang);
				start = start + panjang;
			}
			//alert(huruf[1]);
			var gabunghuruf = huruf.join('.');
			//alert(huruf);
			return gabunghuruf;//node.item(0).value = gabunghuruf;
		}
		else
			return nilai; //node.item(0).value = nilai;
	}
	function validCurrency(name)
	{
		node = document.getElementsByName(name);
		nilai = node.item(0).value;
		var regex = /([0-9])$/;
		if(regex.test(nilai)==false)
		{	
			nilai =  nilai.substr(0,(nilai.length - 1)); 
			node.item(0).value = nilai;
		}
		var hasil = Currency(nilai);
		node.item(0).value = hasil;
	}
	function tambahPostName(name,awal,akhir)
	{	var jumlah = 0;	
		var post = Array(awal,akhir);
		for(i=0; i< post.length; i++)		
		{
			node = document.getElementsByName('post['+post[i]+']');
			nilai = node.item(0).value;
			
			if(nilai.indexOf('.') > 0)
			{	
				var words = Array();
				words = nilai.split(".");
				var wordsgabung = words.join('');
				nilai = parseInt(wordsgabung);
			}
			else
				nilai = parseInt(nilai);
			jumlah = jumlah + nilai;
		}
		jumlah = Currency(String(jumlah));
		var total = document.getElementsByName(name);
		total.item(0).value = jumlah;
	}
	function kurangPostName(name,awal,akhir)
	{	var jumlah = 0;	var jumlahT = Array();
		var post = Array(awal,akhir);
		for(i=0; i< post.length; i++)		
		{
			node = document.getElementsByName('post['+post[i]+']');
			nilai = node.item(0).value;
			
			if(nilai.indexOf('.') > 0)
			{	
				var words = Array();
				words = nilai.split(".");
				var wordsgabung = words.join('');
				nilai = parseInt(wordsgabung);
			}
			else
				nilai = parseInt(nilai);
			jumlahT[i] = nilai;
		}
		jumlah = jumlahT[0] - jumlahT[1];
		jumlah = Currency(String(jumlah));
		var total = document.getElementsByName(name);
		total.item(0).value = jumlah;
	}
	
	function jumlahPostName(name,awal,akhir)
	{	var jumlah = 0;
		for(i=awal; i<=akhir;i++)
		{	//alert(i);
			node = document.getElementsByName('post['+i+']');
			nilai = node.item(0).value;
			
			if(nilai.indexOf('.') > 0)
			{	
				var words = Array();
				words = nilai.split(".");
				var wordsgabung = words.join('');
				nilai = parseInt(wordsgabung);
			}
			else
				nilai = parseInt(nilai);
			jumlah = jumlah + nilai;
		}
		jumlah = Currency(String(jumlah));
		var total = document.getElementsByName(name);
		total.item(0).value = jumlah;
	}

	function kaliPostName(name,awal,akhir)
	{	var jumlah = 1;	
		var post = Array(awal,akhir);
		for(i=0; i< post.length; i++)		
		{
			node = document.getElementsByName('post['+post[i]+']');
			nilai = node.item(0).value;
			
			if(nilai.indexOf('.') > 0)
			{	
				var words = Array();
				words = nilai.split(".");
				var wordsgabung = words.join('');
				nilai = parseInt(wordsgabung);
			}
			else
				nilai = parseInt(nilai);
			jumlah = jumlah * nilai;
		}
		jumlah = Currency(String(jumlah));
		var total = document.getElementsByName(name);
		total.item(0).value = jumlah;
	}

	function convertCur(nilai)
	{
		if(nilai.indexOf('.') > 0)
		{	
			var words = Array();
			words = nilai.split(".");
			var wordsgabung = words.join('');
			nilai = parseInt(wordsgabung);
		}
		else
			nilai = parseInt(nilai);
		
		return nilai;
	}
	
   var timeout    = 3000;
    var closetimer    = 0;
    var ddmenuitem1    = 0;
	var aku = 0; var obj = null;
	function dropdown(ma)
	{	/*if ()
		{
			closetimer = window.setTimeout(mclose, timeout);
		}*/
		if (ma != obj && obj != null) 
		{ //alert(obj); 
  			//closetimer = window.setTimeout(mclose, 500);
			ddmenuitem1 = document.getElementById(obj);
    		mclose(); aku= 0;
			mcancelclosetime()
		} 
	//	else
	//	{
			ddmenuitem1 = document.getElementById(ma);
			ddmenuitem1.style.display = 'block';
	//	}
	/*	if (aku==1)
		{
			document.getElementById(obj).style.display = 'none'; aku = 0;
		}
		   // get new layer and show it
		else if (aku==0 || ) 
		{
			ddmenuitem1 = document.getElementById(ma);
			ddmenuitem1.style.display = 'block';
			aku = 1; 
		} */
		obj = ma;
	}

	function mclose()
	{
		if(ddmenuitem1) ddmenuitem1.style.display = 'none';
	}

	// go close timer
	function mclosetime()
	{
	closetimer = window.setTimeout(mclose, timeout);
	}

	// cancel close timer
	function mcancelclosetime()
	{
		if(closetimer)
		{	
			window.clearTimeout(closetimer);
			closetimer = 0;
		}
	}
	

	function tutupdropdown(id)
	{
		dd = document.getElementById(id);
		dd.style.display = 'none';	
	}

String.prototype.ReplaceAll = function(stringToFind,stringToReplace){
    var temp = this;
    var index = temp.indexOf(stringToFind);
        while(index != -1){
            temp = temp.replace(stringToFind,stringToReplace);
            index = temp.indexOf(stringToFind);
        }
        return temp;
    }

function formatTabelXML(node)
	{ 
	  if (document.getElementById(node))
	  {
		var tabel = document.getElementById(node);
		alert(tabel.rows.item(0).getAttribute('name'));
		var formatHeader = ''; var formatData = '';
		for(i=0; i < tabel.rows.length; i++)
		{
			rowName = tabel.rows.item(i).getAttribute('name');
			row = tabel.rows.item(i);
			if(rowName == 'rowHeader')
			{	formatHeader = formatHeader + '<tr class=rowHeader name=rowHeader>';
				for(j=0; j<row.cells.length; j++)
				{
					kolom = row.cells[j];
					id = (kolom.id != '')? 'id='+kolom.id : '';
					alert(kolom.rowSpan);
					colspan = (kolom.colSpan != '' && kolom.colSpan != '1' )? 'colspan='+kolom.colSpan : '';
					rowspan = (kolom.rowSpan != '' && kolom.rowSpan != '1' )? 'rowspan='+kolom.rowSpan : '';
					value = kolom.innerHTML;
					value = value.ReplaceAll('&nbsp;','');
					value = value.ReplaceAll('&','%n');
					value = value.ReplaceAll('+','%plus');
					formatHeader = formatHeader + "<td "+id+" "+colspan+" "+rowspan+" #attr>"+value+"</td>";
				}		
				formatHeader = formatHeader + "</tr>";
			}
			if(rowName == 'rowData')
			{	formatData = formatData + '<tr class=rowData name=rowData>';
				for(j=0; j<row.cells.length; j++)
				{
					kolom = row.cells[j];
					id = (kolom.id != '')? 'id='+kolom.id : '';
					colspan = (kolom.colSpan != '' && kolom.colSpan != '1' )? 'colspan='+kolom.colSpan : '';
					rowspan = (kolom.rowSpan != '' && kolom.rowSpan != '1' )? 'rowspan='+kolom.rowSpan : '';
					value = kolom.innerHTML;
					value = value.ReplaceAll('&nbsp;','');
					value = value.ReplaceAll('&','%n');
					value = value.ReplaceAll('+','%plus');
					formatData = formatData + "<td "+id+" "+colspan+" "+rowspan+" #attr>"+value+"</td>";
				}		
				formatData = formatData + "</tr>";
			}

		}
		//alert(formatHeader.toString()); 
		formatHeader = formatHeader.ReplaceAll('<',"%lt "); 
		formatHeader = formatHeader.ReplaceAll('>',"%gt ");
		formatData = formatData.ReplaceAll('<',"%lt "); 
		formatData = formatData.ReplaceAll('>',"%gt ");
		//alert(formatHeader);
//		var send='namadok='+nTabel.value+'&desainHeader='+DH+'&desainData='+DD; 
		return Array(formatHeader.toString(),formatData.toString());
			//	formatHeader .= tabel.rows.item(i).innerHTML
//		var formatHeader = tabel.getElementsByName('rowHeader');
//		alert(formatHeader);
	  }
	  else
	  	return false;
		
	}
	
	var li_pencacah = 1;
	
	function linkMenu(sele)
	{
		selected = sele; 
		var tb = document.getElementById('daf_halaman'); var tb2 =''; addPropTabel('linkMenu','auto','auto',Array(tb.innerHTML,tb2))
	}
	
	function linkMenuLi(ele)
	{	li_pencacah = li_pencacah + 1;
		var html_ = "<input type=button onclick=parentNode.remove() class=btn-attr value=Hapus><input type=button onclick=linkMenu(\'lip_"+li_pencacah+"') class=btn-attr value=Link><input type=button onclick=parentNode.childNodes[3].remove() class=btn-attr value=\'Hapus Link\' disabled>";
		var li = document.createElement('li'); li.setAttribute('class','ui-state-default'); li.setAttribute('id','lip_'+li_pencacah); 
		li.innerHTML = html_;
		ele.parentNode.appendChild(li)
	}
	var ukuran = 0;
	function animasiBalik(id)
	{	
		ele = document.getElementById(id);
		ukuran = ele.offsetTop;	
		var i = 1 
	 	var timer = setInterval(function() { 	if(ukuran <= -150) clearTimeout(timer)
												else
										 		ukuran = ukuran - 5;
										 		ele.style.top = ukuran+'px';
												
										 	 }, 5)
	}
	
	function animasiTampil(id)
	{	 //clearTimeout(tii)
		ddmenuitem1 = document.getElementById(id);
		//ddmenuitem1.style.display = 'block';

		ele = document.getElementById(id);
		ukuran = ele.offsetTop;	
		var i = 1 
	 	var timer = setInterval(function() { 	if(ukuran >=0) clearTimeout(timer)
												else
										 		ukuran = ukuran + 5;
										 		ele.style.top = ukuran+'px';
												
										 	 }, 5)
		
	}
	
	function kasiwaktu(id)
	{	
		closetimer = window.setTimeout(function(){
												animasiBalik(id);
												
												}, 2000);
		
		//animasiBalik('Sappawmenuatas')
	}

	function batalkanwaktu()
	{	
		if(closetimer)
		{	
			window.clearTimeout(closetimer);
			closetimer = 0;
		}
	}
	var mouseX,mouseY,mouseX1,mouseY1,tii,closet,ukur_asli;

	function showMousePos(c)
	{
		if(!c) {
			c = event;
		}
		var b = getMousePosition(c);
		
		if(closet)
		{	
			window.clearTimeout(closet);
			closet = 0;
		}

		closet = window.setTimeout(function(){
												window.clearTimeout(tii);
												element = document.getElementById('penunjukarah');
												element.style.display = 'none';
												tii = false;
												}, 3000);
		
			penunjukarah('penunjukarah','');
	}
	
	function getMousePosition(a)
	{
		return a.pageX ? {
			x: a.pageX,
			y: a.pageY
		}:{
			x: a.clientX + document.documentElement.scrollLeft + document.body.scrollLeft,
			y: a.clientY + document.documentElement.scrollTop + document.body.scrollTop
		}
	}
	
	function penunjukarah(id,bo)
	{	
	//alert(mouseX);
			if(!tii)
			{
			element = document.getElementById(id);
			element.style.display = 'block'
			if(!ukur_asli)
				ukur_asli = element.offsetTop;
			ukur = ukur_asli + 20;
			element.offsetTop = ukur+'px';
			var i = 1 
			tii = setInterval(function() { 	if(ukur <= ukur_asli) ukur = ukur + 20;//clearTimeout(timer)
													else
													ukur = ukur - 1;
													element.style.top = ukur+'px';
												 }, 30)
			}
	}
	var stii = 0;
	function slideContent(id,content)
	{ //alert('asdads');
		var selement = document.getElementById(content);
		var sukur_asli = selement.offsetTop;
		if(id != '') sukur_asli = id;
			sukur = sukur_asli ;//+ 0;
			stinggi = tinggi_sisi;
			nilai = sukur_asli - stinggi;
			naik = 10;
			//alert("sukur_asli = "+sukur_asli+" - sukur = "+sukur+" - tinggi = "+stinggi+" - nilai = "+nilai);
			var i = 1 
			var cepat = 20;
			clearTimeout(stii);
			stii = setTimeout(function() { 	//alert(nilai); 
													naik = 10
													ulang = setInterval(function() {
													if(sukur <= nilai){ //nilai = sukur - stinggi; 
														clearTimeout(ulang); slideContent(sukur,content);									
													   }
													if(sukur <= batas_akhir)
													{
														clearTimeout(ulang); selement.style.top = (topp+5) +'px'; slideContent('',content);
													}
													if(sukur == (nilai + 250)) naik = 8;
													if(sukur == (nilai + 170)) naik = 5;
													if(sukur == (nilai + 120)) naik = 3;
													//if(sukur == (nilai + 90)) naik = 2;
													if(sukur < (nilai + 70) && naik > 1)
														{ naik = naik - 1;  //alert(cepat);
														}
												//	else
													sukur = sukur - naik;
													selement.style.top = sukur+'px';
													stii.click();
													}, cepat); 
												 }, 5000)
	}
	var topp,tinggi,batas_akhir,buntut,tinggi_sisi;
	function sliderAsep(idcontent,idisi)
	{ 	//alert('jalanji');
		var selement = document.getElementById(idcontent);
		var sisi = document.getElementById(idisi);
		topp = selement.offsetTop;
		tinggi = selement.offsetHeight;
		batas_akhir = topp - tinggi;
		tinggi_sisi = sisi.offsetHeight;
		buntut = topp + tinggi_sisi;
		//alert(batas_akhir);
		if(tinggi_sisi > 200)
			slideContent('',idcontent);
	}
	var prov = Array();
	var send;
	function provinsi(anak)
	{
		
				 //var anak = parentNode.childNodes; 
				 prov = Array();
				 var k = 0; for(i=0;i<anak.length;i++) {
				if(anak[i].type == 'checkbox'){if(anak[i].checked == true){ prov[k++] =  anak[i].value ; }}}
				prov = prov.join(':');
				//alert(prov);
				send='prov='+prov;
	}
	
	function generateNoreg()
	{
		
	}