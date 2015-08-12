function hitungbayar(no)
{
	var nilai = document.getElementsByName("nilai[]");
	var dibayar = document.getElementsByName("dibayar[]");
	var sisa = document.getElementsByName("sisa[]");
	var hasil =parseInt(nilai.item(no).value) - parseInt(dibayar.item(no).value);
	
	sisa.item(no).value = hasil;
	var panj = (nilai.length) - 1;
	var vnilai = 0; var vdibayar = 0; vsisa =0;
	for(var i=0; i < nilai.length-1; i++)
	{
		vnilai = vnilai + parseInt(nilai.item(i).value);
		vdibayar = vdibayar + parseInt(dibayar.item(i).value);
		//vsisa = vsisa + parseInt(vsisa.item(i).value);
	}
	vsisa = vnilai - vdibayar ;
//	alert (vsisa);
	nilai.item(panj).innerHTML = vnilai;
	dibayar.item(panj).innerHTML = vdibayar;
	sisa.item(panj).innerHTML = vsisa;
//	alert(panj);
}

function ubahisi(parent,url,send)
{	//alert(send);
	 var parent = document.getElementById(parent);
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
	 xmlhttp.open("POST",url,false);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");	 
	
	 xmlhttp.send(send);
	 parent.innerHTML = divisi;
//	 alert(filter);

}

function tbhBaris(tabel,jTD,id)
{
	var eTabel = document.getElementById(tabel);
	var jTR = eTabel.rows.length;
	if(document.getElementById(id));
	else
	{
	var row = eTabel.insertRow(jTR);
	row.setAttribute('class','ritem');
	//alert(jTD.length);
	row.setAttribute('id',id);
	for(i=0;i<jTD.length;i++)
	{
		cell = row.insertCell(i);
		
		if(jTD[i] == '{no}')
		cell.innerHTML = jTR;
		else
		cell.innerHTML = jTD[i];
	}
	cell = row.insertCell(i);
	cell.innerHTML = "<a href=# class=aksi onclick=\"hpsBaris(\'"+tabel+"\',\'"+id+"\');\">Hapus</a>";
	}
}

function hpsBaris(tabel,row)
{	
	var eTabel = document.getElementById(tabel);
	var r = document.getElementById(row);
	eTabel.removeChild(r);
	//alert(eTabel.rows.length)
	for(var i=1; i<eTabel.rows.length;i++)
	{
		eTabel.rows.item(i).cells.item(0).innerHTML = i;
	}

}
function formJS(jns,w,h)
{
			var div = document.createElement("div");
			a = document.getElementById("yyy");
			
			div.setAttribute("class","popup");
			div.setAttribute("id","popup");
		//	div.style.float("left");
			divclose = "<div class=closepopup><div onclick=deleteElement('yyy')>x</div></div><br><div class=isipopup id=isipopup>";
			/*
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
		*/
		
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
 xmlhttp.open("GET","http://localhost/loko/keuangan/popupJenisbiaya/",false);
 xmlhttp.send();

			
			div.innerHTML = divclose + divisi + "<div><br><input type=button value=OK onclick=deleteElement('yyy')></div>";
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