

(function ()
{

	function createElement(tagName, parentElement, attrObj, styleObj, eventObj, label)
	{
		var element=document.createElement(tagName), 
		attrName, eventName, styleName;

		typeof label != "undefined" && element.appendChild(document.createTextNode(label));



		if(attrObj!=null)
		{	
			for(attrName in attrObj)
			element.setAttribute(attrName, attrObj[attrName]);
		}

		if(eventObj!=null)
		{
			for( eventName in eventObj)
			element.addEventListener(eventName, eventObj[eventName]);	
		}


		if(styleObj!=null)
		{
			for(styleName in styleObj)
			element.style[styleName]=styleObj[styleName];
		}
		


		parentElement.appendChild(element);
		
		return element;
	} //end of createElement	


	var body = document.body;
	//createElement("div", body, {id:"aaaa", xyz: "bbb"}, {backgroundColor:"red",width:"200px", height: "300px"}, {click: function () {console.log("aa")}, hover: function(){console.log("bbb")}}, "Suvradip")

	var mainContainer = createElement("div", body, {id:"mainContainer"}, { padding:"0 0 0 30%"}, {} );
	
	var block = createElement("div", mainContainer, {id:"block"}, {width:"50%", height:"50px", padding:"2"} );

	createElement("input", block, {id:"basicCalc", type:"radio", name:"selectors"}, {},{click: function () {renderEvent(this.id)}} );
	createElement("span",  block, {undefined}, {},{}, "Basic Calculator");

	createElement("input", block, {id:"dateCalc", type:"radio", name:"selectors"}, {},{click: function () {renderEvent(this.id)}} );
	createElement("span",  block, {}, {},{}, "Date/Time Calculator");

	createElement("input", block, {id:"mortCalc", type:"radio", name:"selectors"}, {},{click: function () {renderEvent(this.id)}} );
	createElement("span",  block, {}, {},{}, "Mortgage Calculator");


	var renderingArea= createElement("div", mainContainer, {id:"renderingArea"}, { width:"50%", height:"30em"}, {} );


	function renderEvent(nameEve)
	 {
		if(nameEve=="basicCalc")
	 	{
	 	renderingArea.innerHTML="";	
	 	basicCalculator();
	 	}

		if(nameEve=="dateCalc")
		{	
	    console.log(nameEve);
	    dateTimeCalculator();
	 	}

		if(nameEve=="mortCalc")
		{
		console.log(nameEve);
		mortgageCalculator();
		}	
	}//end of renderEvent 






	function basicCalculator()
	{
	   createElement("span", renderingArea, {id:"mtxt"}, {position: "absolute", fontSize: "15px", visibility: "hidden"}, {}, "M");
	   createElement("input", renderingArea, {type:"text", id:"textbox", placeholder:"0" }, {width:"26.8em", height:"2em", textAlign:"right"},{}); 

	   var myTable=  createElement("table",renderingArea, {id:"myTable"}, {}, {});	
	   

		function insertRowCOlumn(rowCreateCondition, trPos, tdPos, BText, myFunction)
		{
			if(rowCreateCondition)
		    createElement("tr", myTable, {id:trPos}, {}, {});
		
		    var td = document.createElement("TD");
		    createElement("input",td,{type:"submit", value:BText},{width: "6em", height: "3em", background: "transparent",borderRadius: "5px", border: "1px solid #00CC33",outline:"none", cursor:"pointer" },{click: function () {myFunction(this)}});
		    document.getElementById(trPos).appendChild(td);
		}
	

	    insertRowCOlumn(true,  0, 1, "MC",memoryOperation);
	    insertRowCOlumn(false, 0, 2, "M+",memoryOperation);
	    insertRowCOlumn(false, 0, 3, "M-",memoryOperation);
	    insertRowCOlumn(false, 0, 4, "MR",memoryOperation);

	    insertRowCOlumn(true,  1, 1, "CLS",clearTbx);
	    insertRowCOlumn(false, 1, 2, "CAN",cancel);
	    insertRowCOlumn(false, 1, 3, "R",textEnter);
	    insertRowCOlumn(false, 1, 2, "%",textEnter);

	    insertRowCOlumn(true,  2, 1, "7",textEnter);
	    insertRowCOlumn(false, 2, 2, "8",textEnter);
	    insertRowCOlumn(false, 2, 3, "9",textEnter);
	    insertRowCOlumn(false, 2, 2, "+",textEnter);

	    insertRowCOlumn(true,  3, 1, "4",textEnter);
	    insertRowCOlumn(false, 3, 2, "5",textEnter);
	    insertRowCOlumn(false, 3, 3, "6",textEnter);
	    insertRowCOlumn(false, 3, 4, "-",textEnter);

	    insertRowCOlumn(true,  4, 1, "1",textEnter);
	    insertRowCOlumn(false, 4, 2, "2",textEnter);
	    insertRowCOlumn(false, 4, 3, "3",textEnter);
	    insertRowCOlumn(false, 4, 4, "*",textEnter);

	    insertRowCOlumn(true,  5, 1, ".",textEnter);
	    insertRowCOlumn(false, 5, 2, "0",textEnter);
	    insertRowCOlumn(false, 5, 3, "=",calculate);
	    insertRowCOlumn(false, 5, 4, "/",textEnter);


		var mydot=true;
		var MEMORY=0;

		function textEnter(bid)
		{
			if(bid.value==".")
			{
			  if(mydot)
			  {
			  document.getElementById('textbox').value+=bid.value;
			  mydot=false;
			  }

			}
			else
			{
			  if(bid.value=="+" || bid.value=="-" || bid.value=="*" || bid.value=="/")
			  {
			    mydot=true;
			  }
			  document.getElementById('textbox').value+=bid.value;
			}
		}


		function calculate()
		{

			var store=document.getElementById('textbox').value+"$";
			var numbers=[];
			var operators=[];
			var p=0,c=0,f="", f1=false;
			for(var i=0; i<store.length;i++)
			{

	             if(store[i]=="+" ||store[i]=="-"||store[i]=="*"||store[i]=="/"||store[i]=="%"||store[i]=="R" ||store[i]=="$" )
	             {
	               operators.push(i);
	               if(store[i]!="$")
	               f=store[i];
	             }


			}

	        for(var i=0;i<operators.length;i++)
	        {
	           c=operators[i];
	            var num="";
	          for(var j=p; j<c;j++)
	          {
	            num+=store[j];
	          }

	            numbers.push(parseFloat(num));
	          p=c+1;
	        }


		    if(f=="+")
		    document.getElementById('textbox').value=sum(numbers);
		    else if(f=="-")  document.getElementById('textbox').value=sub(numbers);
		    else if(f=="*")  document.getElementById('textbox').value=mult(numbers);
		    else if(f=="/")  document.getElementById('textbox').value=div(numbers);
		    else if(f=="%")  document.getElementById('textbox').value=percent(numbers);
		    else if(f=="R")  document.getElementById('textbox').value=rem(numbers);
		}


		function sum(numbers)
		{
		    var res=0;
		    for(var i=0; i<numbers.length;i++)
		    {
		       res+=numbers[i];
		    }

		    return res;
		}


		function mult(numbers)
		{
		   var res=1;
		    for(var i=0; i<numbers.length;i++)
		    {
		       res*=numbers[i];
		    }

		    return res;
		}


		function sub(numbers)
		{
		   var res, p=0;
		    for(var i=0; i<numbers.length;i++)
		    {
		       if(p!=0)
		       {
		            res-=numbers[i];
		       }else
		       {
		         p=1;
		         res=numbers[i];
		       }

		    }

		    return res;
		}


		function div(numbers)
		{
		   var res, p=0;
		    for(var i=0; i<numbers.length;i++)
		    {
		       if(p!=0)
		       {
		            res/=numbers[i];
		       }else
		       {
		         p=1;
		         res=numbers[i];
		       }

		    }

		    return res;
		}



		function clearTbx()
		{
			var v1=document.getElementById('textbox');
			v1.value="";
		    mydot=true;
		}


		function cancel()
		{
		 var t=document.getElementById('textbox').value;
		document.getElementById('textbox').value=t.substring(0,t.length -1);
		}


		function percent(numbers)
		{
		   return numbers[0]/100;
		}


		function rem(numbers)
		{
		 var res;

		    if(numbers[0]>numbers[1])
		     res=numbers[0] % numbers[1];
		   else
		     res="wrong input format.";

		   return res;
		}


		function memoryOperation(op)
		{
		  var v =document.getElementById('textbox').value;
		  var sm=document.getElementById('mtxt');

		      if(op.value=="M+")
		      {
		         MEMORY+=parseFloat(v);
		         sm.style.visibility="visible";
		      }

		      else if(op.value=="M-")
		      {
		        MEMORY-=parseFloat(v);
		        sm.style.visibility="visible";
		      }
		      else if(op.value=="MC")
		      {
		        MEMORY=0;
		        sm.style.visibility="hidden";
		      }
		      else if(op.value=="MR")
		      {
		       document.getElementById('textbox').value=MEMORY;
		       sm.style.visibility="visible";
		      }

		}


	}//end basiccalc


	




	//=====================================================================================


	function dateTimeCalculator()
	{
			renderingArea.innerHTML="";

			var div1 = createElement("div",   renderingArea, {id:"div1"}, {border:"1px solid", width: "100%",margin:"2%",padding:"2%"}, {});
					   createElement("span",  div1, {}, {}, {}, "Date 1 : ");
					   createElement("input", div1, {id:"d1", type:"text", placeholder:"Year Month Date"}, {}, {});

					   createElement("span",  div1, {}, {}, {}, "Date 2 : ");
					   createElement("input", div1, {id:"d2", type:"text", placeholder:"Year Month Date"}, {}, {});
					   createElement("input", div1, { type:"submit", value:"Date Difference"}, {}, {click: function(){ dateCalc() }});
					   createElement("span",  div1, { id:"s1"}, { marginLeft:"3%", marginRight:"2%"}, {});
					   createElement("span",  div1, { id:"s2"}, {marginRight:"2%"}, {});
					   createElement("span",  div1, { id:"s3"}, {marginRight:"2%"}, {});
					   createElement("span",  div1, { id:"s4"}, {marginRight:"2%"}, {});



			var timeDiffDiv = createElement("div", renderingArea, {id:"timeDiffDiv"}, {border:"1px solid", width: "100%",margin:"2%",padding:"2%"}, {});		   

			var div2 = createElement("div", timeDiffDiv, {id:"div1"}, { width: "100%"}, {});
					   createElement("span",  div2, {}, {}, {}, "Time 1 : ");
					   createElement("input", div2, {id:"t1", type:"text", placeholder:"Time 1 HH"}, {}, {});
					   createElement("input", div2, {id:"t2", type:"text", placeholder:"Time 1 MM"}, {}, {});

			var div3 = createElement("div", timeDiffDiv, {id:"div1"}, { width: "100%"}, {});
					   createElement("span",  div3, {}, {}, {}, "Time 2 : ");
					   createElement("input", div3, {id:"t3", type:"text", placeholder:"Time 2 HH"}, {}, {});
					   createElement("input", div3, {id:"t4", type:"text", placeholder:"Time 2 MM"}, {}, {});

					   createElement("input", timeDiffDiv, { type:"submit", value:"Time Difference"}, {}, {click: function(){ timeCalc() }});
					   createElement("span",  timeDiffDiv, { id:"s5"}, { marginLeft:"3%", marginRight:"2%"}, {});
					   createElement("span",  timeDiffDiv, { id:"s6"}, {marginRight:"2%"}, {});
					   createElement("span",  timeDiffDiv, { id:"s7"}, {marginRight:"2%"}, {});



			var timeIntDiv = createElement("div", renderingArea, {id:"timeDiffDiv"}, {border:"1px solid", width: "100%",margin:"2%",padding:"2%"}, {});		   

			var div4 = createElement("div", timeIntDiv, {id:"div1"}, { width: "100%"}, {});
					   createElement("span",  div4, {}, {marginRight:"7%"}, {}, "Date : ");
					   createElement("input", div4, {id:"ti1", type:"text", placeholder:"Year Month Date"}, {width:"9em", marginRight:"3%"}, {});
					   createElement("input", div4, {id:"ti2", type:"text", placeholder:"MM", maxlength:"2"}, {width:"9em", marginRight:"3%"}, {});
					   createElement("input", div4, {id:"ti3", type:"text", placeholder:"HH", maxlength:"2"}, {width:"7em"}, {});

			var div5 = createElement("div", timeIntDiv, {id:"div1"}, { width: "100%"}, {});
					   createElement("span",  div5, {}, {}, {}, "Interval : ");
					   createElement("input", div5, {id:"ti4", type:"text", placeholder:"HH"}, {width:"9em", marginLeft:"3%", marginRight:"3%"}, {});
					   createElement("input", div5, {id:"ti5", type:"text", placeholder:"MM"}, {width:"9em"}, {});

					   createElement("input", timeIntDiv, { type:"submit", value:"Calculate new date"}, {}, {click: function(){ timeInterval() }});
					   createElement("span",  timeIntDiv, { id:"s8"}, {marginLeft:"2%"}, {});		



					 

			var datedifference = 
			{

			    days: function(d1, d2) {
			        var t2 = d2.getTime();
			        var t1 = d1.getTime();

			        return parseInt((t2-t1)/(24*3600*1000));
			    },

			    weeks: function(d1, d2) {
			        var t2 = d2.getTime();
			        var t1 = d1.getTime();

			        return parseInt((t2-t1)/(24*3600*1000*7));
			    },

			    months: function(d1, d2) {
			        var d1Y = d1.getFullYear();
			        var d2Y = d2.getFullYear();
			        var d1M = d1.getMonth();
			        var d2M = d2.getMonth();

			        return (d2M+12*d2Y)-(d1M+12*d1Y);
			    },

			    years: function(d1, d2) {
			        return d2.getFullYear()-d1.getFullYear();
			    }
			}


			function dateCalc()
			{
				var temp=new Date();

				var d1=document.getElementById("d1").value;
				var d2=document.getElementById("d2").value;
				
				var date1 = new Date(d1); 
				var date2 = new Date(d2); 

				//new Date('1945/05/09').valueOf() < new Date('2011/05/09').valueOf()

				if(date1<date2)
				{
				temp=date1;
				date1=date2;
				date2=temp;
				}

				

				document.getElementById('s1').innerHTML="Days : "+datedifference.days(date2,date1);
				document.getElementById('s2').innerHTML="Weeks : "+datedifference.weeks(date2,date1);
				document.getElementById('s3').innerHTML="Months "+datedifference.months(date2,date1);
				document.getElementById('s4').innerHTML="Years : "+datedifference.years(date2,date1);
			}


			function timeCalc()
			{
				
				var t1=document.getElementById("t1").value;
				var t2=document.getElementById("t2").value;

				var t3=document.getElementById("t3").value;
				var t4=document.getElementById("t4").value;


				if(t1=="")
				t1=0;

				if(t2=="")
				t2=0;

				if(t3=="")
				t3=0;

				if(t4=="")
				t4=0;

				var date1 = new Date(2000, 0, 1,  t1, t2); 
				var date2 = new Date(2000, 0, 1,  t3, t4); 

				if (date2 < date1) {
				    date2.setDate(date2.getDate() + 1);
				}

				var diff = date2 - date1;


				var msec = diff;

				var hh = Math.floor(msec / 1000 / 60 / 60);
				msec -= hh * 1000 * 60 * 60;

				var mm = Math.floor(msec / 1000 / 60);
				msec -= mm * 1000 * 60;

				var ss = Math.floor(msec / 1000);
				msec -= ss * 1000;


				document.getElementById('s5').innerHTML="HH : "+hh;
				document.getElementById('s6').innerHTML="MM : "+mm;
				document.getElementById('s7').innerHTML="SS "+ss;

			}


			function timeInterval()
			{
				var t1=document.getElementById("ti1").value;
				var t2=document.getElementById("ti2").value;

				var t3=document.getElementById("ti3").value;
				var t4=document.getElementById("ti4").value;
				var t5=document.getElementById("ti5").value;

				var d1 = new Date(t1); 
			
				var date1=new Date(d1.getFullYear(),d1.getMonth(),d1.getDate(),t2,t3);

				date1.setHours(date1.getHours()+parseInt(t4));
				date1.setMinutes(date1.getMinutes()+parseInt(t5));

				document.getElementById('s8').innerHTML=date1;

			}
     

}//dateTimeCalculator


//Mortgage Calculator 
function mortgageCalculator()
{

	renderingArea.innerHTML="";
	var div1 = createElement("div", renderingArea, {id:"div1", width:"100%"}, {}, {});
	createElement("span",  div1, {}, {marginRight:"14%"}, {}, "Loan Amount(Rs.) : ");
	createElement("input", div1, {type:"text", id:"loan",   placeholder:"Enter Here Amount" }, {}, {});

	var div2 = createElement("div", renderingArea, {id:"div2", width:"100%"}, {}, {});
	createElement("span",  div2, {}, {marginRight:"28.5%"}, {}, "Rate(%) : ");
	createElement("input", div2, {type:"text", id:"myrete", placeholder:"Enter Here Rate" }, {}, {});

	var div3 = createElement("div", renderingArea, {id:"div3", width:"100%"}, {}, {});
	createElement("span",  div3, {}, {}, {}, "Period of Payement(Months) : ");
	createElement("input", div3, {type:"text", id:"time",   placeholder:"Enter Here Time in Months" }, {}, {});

	var div4 = createElement("div", renderingArea, {id:"div4", width:"100%"}, {}, {});
	createElement("span",  div4, {}, {marginRight:"26.8%"}, {}, "EMI(Rs.) : ");
	createElement("input", div4, {type:"text", id:"emi",    placeholder:"Enter Here Amount" }, {}, {});

	var div5 = createElement("div", renderingArea, {id:"div4", width:"100%"}, {}, {});
	createElement("input", div5, {type:"submit", value:"Calculate" }, {marginTop:"3%"}, {click: function(){myCalculation()}});
	createElement("span", div5, {id:"msg"}, {}, {});



	function myCalculation()
	{
		//at first clearing the Error Message.
		document.getElementById('msg').innerHTML="";
		//Getting all the values from input text fields
		var p=document.getElementById('loan').value;
		
		var r=document.getElementById('myrete').value / 1200; // User gives the input as month per Interest,
		var t=document.getElementById('time').value;
		var e=document.getElementById('emi').value;
		//condition for calculating the EMI
		if(p.length!==0 && t.length!==0 && r.length!==0 )
			{
				
				document.getElementById('emi').value= Math.round(p * r * Math.pow((1+r),t)/ ((Math.pow((1+r),t))-1));
			}
			//condtion for calculate Princile or Loan Amount
			else if(r.length!==0 && t.length!==0 && e.length!==0)
			 {
				document.getElementById('loan').value = Math.round(e * ((Math.pow(1+r,t))-1)/(r*(Math.pow((1+r),t)))); 
			 }
			 //condtion for calculate Time.
			else if(p.length!==0 && r.length!==0 && e.length!==0)
			 {
			 	var res=Math.ceil((Math.log((e)/(e-(p*r))))/(Math.log(1+r))); 
			 	////condtion, if time becomes Very big.
			 	if(isNaN(res))	
				document.getElementById('msg').innerHTML ="can't possible."; 
				else
				document.getElementById('time').value =res; 	
			}
			else
			{
				document.getElementById('msg').innerHTML = 'Incorrenct Data Given, Please correct it then calculate!!';	
			}
	}

} //end of mort function





})()
