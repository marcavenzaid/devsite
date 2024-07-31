// Set the elements in a select tag for date.
function setDate(){
	var kcyear = document.getElementsByName("year")[0];
	var	kcmonth = document.getElementsByName("month")[0];
	var	kcday = document.getElementsByName("day")[0];
         
  var d = new Date();
  var n = d.getFullYear() - 8;

  kcyear.length = 0;

  for (var i = n; i >= n - 100; i--) {
		var opt = new Option();
    	opt.value = opt.text = i;
	 	kcyear.add(opt);
  }

  kcyear.addEventListener("change", validate_date);
  kcmonth.addEventListener("change", validate_date);

  function validate_date() {
  	var y = +kcyear.value, m = kcmonth.value, d = kcday.value;
  	
  	if (m === "2"){
   		var mlength = 28 + (!(y & 3) && ((y % 100) !== 0 || !(y & 15)));
  	}
  	else {
  		var mlength = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31][m - 1];
  	}
  	
  	kcday.length = 0;
   
  	for (var i = 1; i <= mlength; i++) {
    	var opt = new Option();

    	opt.value = opt.text = i;
    	
    	if (i == d) {
    		opt.selected = true;
    	}
		
		  kcday.add(opt);
  	}
  }
  
  validate_date();
}

// Select a value in a select tag.
function selectElement(id, valueToSelect) {    
  var element = document.getElementById(id);
  element.value = valueToSelect;
}

// Set the selected gender based on gender in database.
function setGender(idFemale, idMale, value) {
  if(value == 'f') {
    document.getElementById(idFemale).checked = true;
  } else {
    document.getElementBy(idMale).checked = true;
  }
}

// Read the selected file. e.g. Show image preview.
function readURL(input) {
  if(input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
      $('#imagePreview').attr('src', e.target.result);
    };

    reader.readAsDataURL(input.files[0]);
  }
}