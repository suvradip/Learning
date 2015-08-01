
var int1, int2, int3;
		 
function tabToggle(x)
{
	
	if(x==1)
	{	
	document.getElementById("x1").style.zIndex = "0";
	document.getElementById("x2").style.zIndex = "1";
	document.getElementById("tab1_h2").style.backgroundColor = "#FFFFFF";
	document.getElementById("tab2_h2").style.backgroundColor = "#E4EFFF";
	document.getElementById("tab1_h2_a").style.color = "#717171";
	document.getElementById("tab2_h2_a").style.color = "#09569d";
	}
	else
	{
	document.getElementById("x1").style.zIndex = "1";
	document.getElementById("x2").style.zIndex = "0";
	document.getElementById("tab1_h2").style.backgroundColor = "#E4EFFF";
	document.getElementById("tab2_h2").style.backgroundColor = "#FFFFFF";
	document.getElementById("tab1_h2_a").style.color = "#09569d";
	document.getElementById("tab2_h2_a").style.color = "#717171";
	
	}
}	


function numbercheck(e)
{
    var unicode=e.charCode? e.charCode : e.keyCode
    if (unicode!=8){ //if the key isn't the backspace key (which we should allow)
        if (unicode<48||unicode>57) //if not a number
            return false //disable key press
    }
}


function cbchange(cb) {
  if(cb.checked == true){
   document.getElementById("cb1_sub").style.visibility = "block";
  }else{
   alert('Message 2');
  }
}


function checkboxValue(cb1,cb2,cb3)
{
    
	int1="";
	int2="";
	int3="";

    if (cb1.checked == true)
    {
         int1 = cb1.value;
    }

    if (cb2.checked == true)
    {
         int2 = cb2.value;
    }
   
    if (cb3.checked == true)
    {
         int3 = cb3.value;
    }
    
}



function radioCheckedValue(rname)
{
  var test = document.getElementsByName(rname);
    for (i=0; i < test.length; i++)
     {
        if(test[i].checked==true) 
        return test[i].value;   		 
    }
}


function getData()
{

//checking textboxe values
if(document.getElementById("name").value!="" && document.getElementById("email").value!=""  && document.getElementById("country").selectedIndex!=0 && document.getElementById("address").value!=""  )
		{

			//gets the all value from text boxes	
			var n=document.getElementById("name").value;
			var e=document.getElementById("email").value;
            var p=document.getElementById("phone").value;
			var ele = document.getElementById("country");
			var c = ele.options[ele.selectedIndex].text;

           // var s=ele.options[document.getElementById("state").selectedIndex].text;

			var a=document.getElementById("address").value;
			var cb1=document.getElementById("cb1");
			var cb2=document.getElementById("cb2");
			var cb3=document.getElementById("cb3");

			//checkboxValue(cb1,cb2,cb3);

			var gender =  radioCheckedValue("sex");
			
            var cb1=document.getElementById("cb1");
            var cb2=document.getElementById("cb2");
            var cb3=document.getElementById("cb3");
            var games=[];
            var movies=[];
            var reading=[];

            if(cb1.checked==true)
            {
               
                var els = document.getElementsByName('games');
                for (var i=0;i<els.length;i++)
                {
                    if ( els[i].checked ) 
                    {
                     games.push(els[i].value);
                    }
                 }
            }

             if(cb2.checked==true)
            {
               
                var els = document.getElementsByName('movies');
                for (var i=0;i<els.length;i++)
                {
                    if ( els[i].checked ) 
                    {
                     movies.push(els[i].value);
                    }
                 }
            }
             if(cb3.checked==true)
            {
               
                var els = document.getElementsByName('reading');
                for (var i=0;i<els.length;i++)
                {
                    if ( els[i].checked ) 
                    {
                     reading.push(els[i].value);
                    }
                 }
            }

            //storing this data in Jason 
    		var data=({
						"name":n,
						"email":e,
                        "phone":p,
						"country":c,
						"address":a,
						"sex":gender,
						"games":games,
						"movies":movies,
						"reading":reading

    				});

				console.log(JSON.stringify(data));
		}


}



function overlay(cb) 
{
	el = document.getElementById("overlay");
	el.style.visibility = (el.style.visibility == "visible") ? "hidden" : "visible";
	
	var cb1_sub=document.getElementById("cb1_sub")
	var cb2_sub=document.getElementById("cb2_sub")
	var cb3_sub=document.getElementById("cb3_sub")





	if(cb==1)
	{
		cb1_sub.style.display="block";
		cb2_sub.style.display="none";
		cb3_sub.style.display="none";

		
		if(document.getElementById("cb1_sub_1").checked==true || document.getElementById("cb1_sub_2").checked==true || document.getElementById("cb1_sub_3").checked==true)
		document.getElementById("cb1").checked=true;
		
	}

	if(cb==2)
	{
		cb1_sub.style.display="none";
		cb2_sub.style.display="block";
		cb3_sub.style.display="none";

		if(document.getElementById("cb2_sub_1").checked==true || document.getElementById("cb2_sub_2").checked==true || document.getElementById("cb2_sub_3").checked==true)
		document.getElementById("cb2").checked=true;
		
	}

	if(cb==3)
	{
		cb1_sub.style.display="none";
		cb2_sub.style.display="none";
		cb3_sub.style.display="block";

		if(document.getElementById("cb3_sub_1").checked==true || document.getElementById("cb3_sub_2").checked==true || document.getElementById("cb3_sub_3").checked==true)
		document.getElementById("cb3").checked=true;
		
	}

	
}


function cbcheck()
{

		if(document.getElementById("cb1_sub_1").checked==true || document.getElementById("cb1_sub_2").checked==true || document.getElementById("cb1_sub_3").checked==true)
		  document.getElementById("cb1").checked=true;
		else
		  document.getElementById("cb1").checked=false;	
		

		if(document.getElementById("cb2_sub_1").checked==true || document.getElementById("cb2_sub_2").checked==true || document.getElementById("cb2_sub_3").checked==true)
		  document.getElementById("cb2").checked=true;
		else
		  document.getElementById("cb2").checked=false;	
	
		
		if(document.getElementById("cb3_sub_1").checked==true || document.getElementById("cb3_sub_2").checked==true || document.getElementById("cb3_sub_3").checked==true)
		  document.getElementById("cb3").checked=true;
		else
		  document.getElementById("cb3").checked=false;	
		
}

var states = new Array(2) 
    states["0"] = ["Select"]; 
    states["IN"] = 
    ["Andhra Pradesh",
    "Arunachal Pradesh",
    "Assam",
    "Bihar",
    "Chhattisgarh",
    "Goa",
    "Gujarat",
    "Haryana",
    "Himachal Pradesh",
    "Jammu and Kashmir",
    "Jharkhand",
    "Karnataka",
    "Kerala",
    "Madhya Pradesh",
    "Maharashtra",
    "Manipur",
    "Meghalaya",
    "Mizoram",
    "Nagaland",
    "Odisha",
    "Punjab",
    "Rajasthan",
    "Sikkim", 
    "Tamil Nadu",
    "Telangana",
    "Tripura",
    "Uttar Pradesh",
    "Uttarakhand",
    "West Bengal"];
     
     states["US"] = 
     [
     "Alabama",
    "Alaska",
    "Arizona",
    "Arkansas",
    "California",
    "Colorado",
    "Connecticut",
    "Delaware",
    "Florida",
    "Georgia",
    "Hawaii",
    "Idaho",
    "Illinois",
    "Indiana",
    "Iowa",
    "Kansas",
    "Kentucky",
    "Louisiana",
    "Maine",
    "Maryland",
    "Massachusetts",
    "Michigan",
    "Minnesota",
    "Mississippi",    
    "Missouri",
    "Montana",
    "Nebraska",
    "Nevada",
    "New Hampshire",
    "New Jersey",
    "New Mexico",
    "New York",
    "North Carolina",
    "North Dakota",
    "Ohio",
    "Oklahoma",
    "Oregon",
    "Pennsylvania",
    "Rhode Island",
    "South Carolina",
    "South Dakota",
    "Tennessee",
    "Texas",
    "Utah",
    "Vermont",
    "Virginia",
    "Washington",
    "West Virginia",
    "Wisconsin",
    "Wyoming"];

    function stateChange(selectObj) { 
        document.getElementById("state").disabled=false;
        var idx = selectObj.selectedIndex;
        var which = selectObj.options[idx].value;
    
        var uList = states[which];
        var state = document.getElementById("state");
     
       

        while (state.options.length > 0) 
            { 
                state.remove(0); 
            }
        var newOption;
        // create and add new options 
        for (var i=0; i<uList.length; i++) 
        {
            newOption = document.createElement("option"); 
            newOption.value = uList[i];  
            newOption.text=uList[i];
            try { 
                state.add(newOption); 
                } 
            catch (e) { 
                state.appendChild(newOption);
                } 
        }
    }


    function checkIndia()
    {
        var phone=document.getElementById("phone");
        var n = phone.value.charAt(0);
        if (n=="7" || n=="8" || n=="9")   
            if (phone.value.length==10)
            phone.style.borderColor = "green";
            else
            phone.style.borderColor = "red";            
        else
            phone.style.borderColor = "red";
        
    }

    function removeOptions()
    {
        
        document.getElementById("state").innerHTML="";
        document.getElementById("state").disabled=true;
        document.getElementById("subscription").innerHTML="";
        document.getElementById("nameErr").innerHTML="";
        document.getElementById("phoneErr").innerHTML="";   
        document.getElementById("emailErr").innerHTML="";
        document.getElementById("stateErr").innerHTML="";   
        document.getElementById("feedbackErr").innerHTML="";    
        document.getElementById("sexErr").innerHTML=""; 
        document.getElementById("interestErr").innerHTML="";    
        document.getElementById("emailValidate").innerHTML="";  
        document.getElementById("phoneValidate").innerHTML="";  
        document.getElementById("countryErr").innerHTML="";    
    }


    function populateState(selectObj)
     { 
        document.getElementById("state").disabled=false;
        var idx = selectObj.selectedIndex;
        var which = selectObj.options[idx].value;
    
        var uList = states[which];
        var state = document.getElementById("state");
     
       

       
        var newOption;
        // create and add new options 
        for (var i=0; i<uList.length; i++) 
        {
            newOption = document.createElement("option"); 
            newOption.value = uList[i];  
            newOption.text=uList[i];
            try { 
                state.add(newOption); 
                } 
            catch (e) { 
                state.appendChild(newOption);
                } 
        }
    }