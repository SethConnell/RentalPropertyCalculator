jQuery(document).ready(function($) { // document is ready, execute app
    // Quickly hides the tables once they're loaded. This code will be removed later and hardcoded into the html styling itself so that the tables never render at all at first.
    $(".table").hide();
    $(".table2").hide();
    $(".table3").hide();
	$("#result").hide();
	$(".resulttitle").hide();
	$("#chartplace").hide();
    $(".firstyearexpensebreakdown").hide()
    
    // updateCost is used to increase a certain number by a given rate.
    function updateCost(currentcost, rate) {
        return +currentcost + (+currentcost * (+rate / 100));
    };
    
    // Checks when the document is ready.
    $(document).ready(function () {
        
        // When the butten with the "btAdd" id is clicked, it runs the AddText function.
        $('#btAdd').click(function () {
            AddText();
        });
        
        // Just autofills the input values of the form when the autofill button is clicked.
        $('#autofill').click(function () {
            $('#purchase_price').val("111000");
            $("#down_payment").val("25");
            $("#interest_rate").val("4.5");
            $("#loan_term").val("30");
            $("#closing_cost").val("1110");
            $("#repair_cost").val("0");
            $("#new_value").val("115000");
            $("#propertytaxcost").val("750");
            $("#insurencecost").val("1000");
            $("#hoafeecost").val("0");
            $("#maintenancecost").val("2000");
            $("#othercost").val("300");
            $("#monthlyrent").val("1100");
            $("#othermonthlyincome").val("0");
            $("#vacancyrate").val("5");
            $("#managementfee").val("10");
            $("#valueappreciation").val("3");
            $("#holdinglength").val("30");
            $("#costtosell").val("0");
            $("#propertytaxincrease").val("3");
            $("#insurenceincrease").val("3");
            $("#hoafeeincrease").val("3");
            $("#maintenanceincrease").val("3");
            $("#otherincrease").val("3");
            $("#otherincomeincrease").val("3");
            $("#annualrentincrease").val("3");
        });
        
        // The AddText function gets the calculations calculating :-)
        function AddText() {
			
            // Set Purchase variables to the inputs made by the user.
            var purchase_price, down_payment, interest_rate, loan_term, closing_cost;
            purchase_price = $('#purchase_price').val();
            down_payment = $("#down_payment").val();
            interest_rate = $("#interest_rate").val();
            loan_term = $("#loan_term").val();
            closing_cost = $("#closing_cost").val();
            repair_cost = $("#repair_cost").val();
            new_value = $("#new_value").val();
            
            // Set Recurring Operating Expenses variables.
            var propertytaxcost, insurencecost, hoafeecost, maintenancecost, othercost;
            var propertytaxincrease, insurenceincrease, hoafeeincrease, maintenanceincrease, otherincrease;
            
            propertytaxcost = $("#propertytaxcost").val();
            var oldpropertytaxcost = propertytaxcost;
            insurencecost = $("#insurencecost").val();
            var oldinsurencecost = insurencecost;
            hoafeecost = $("#hoafeecost").val();
            var oldhoafeecost = hoafeecost;
            maintenancecost = $("#maintenancecost").val();
            var oldmaintenancecost = maintenancecost;
            othercost = $("#othercost").val();
            var oldothercost = othercost;
            propertytaxincrease = $("#propertytaxincrease").val();
            insurenceincrease = $("#insurenceincrease").val();
            hoafeeincrease = $("#hoafeeincrease").val();
            maintenanceincrease = $("#maintenanceincrease").val();
            othercost = $("#othercost").val();
            otherincrease = $("#otherincrease").val();
            
            // Set Income variables.
            var monthlyrent, insurencecost, vacancyrate, managementfee;
            var annualrentincrease, othermonthlyincome, otherincomeincrease, firstmonthlyrent;
            monthlyrent = $("#monthlyrent").val();
            firstmonthlyrent = +monthlyrent;
            othermonthlyincome = $("#othermonthlyincome").val();
            otherincomeincrease = $("#otherincomeincrease").val();
            vacancyrate = $("#vacancyrate").val();
            managementfee = $("#managementfee").val();
            annualrentincrease = $("#annualrentincrease").val();
            
            
            
            // Sell variables.
            var valueappreciation, holdinglength, costtosell;
            valueappreciation = $("#valueappreciation").val();
            holdinglength = $("#holdinglength").val();
            costtosell = $("#costtosell").val();
            
            //Convert interest rate to decimal.
            interest_rate = interest_rate / 100;
            
            // Set Income variables
            
            // helps find fixed monthly payment formula.
            var principle, fmp;
            principle = purchase_price - (purchase_price * (down_payment / 100));
            
            // Change interest rate to terms of per month instead of year.
            var interest_rate = interest_rate / 12;
            
            fmp = (principle * (interest_rate * Math.pow((1 + interest_rate), (12 * loan_term)))) / (Math.pow((1 + interest_rate), (12 * loan_term)) - 1);
            
            var mortgage = (+fmp * 12);
            var vacancy_cost = ((+monthlyrent * 12) * (+vacancyrate / 100));
            var managementfee_cost = (((+monthlyrent * 12) - vacancy_cost) * (managementfee / 100));
            var expense_breakdown_total = +othercost + +mortgage + +vacancy_cost + +managementfee_cost + +propertytaxcost + +insurencecost + +othercost + maintenancecost;
            
            // expense breakdown formula
            function breakdown(a) {
              return (+a / +expense_breakdown_total);
            }
            var mortage_percent = breakdown(+mortgage);
            var othercost_percent = breakdown(+othercost);
            var maintenance_percent = breakdown(+maintenancecost);
            var insurence_percent = breakdown(+insurencecost);
            var propertytax_percent = breakdown(+propertytaxcost);
            var managementfee_percent = breakdown(+managementfee_cost);
            var vacancy_percent = breakdown(+vacancy_cost);
            
            
            // This empties the values in uploaded charts. (They're getting replaced.)
            $("#infotable").empty();
			$("#infotable2").empty();
            $("#monthlyincome").empty();
            $("#annualincome").empty();
            $("#monthlymortgage").empty();
            $("#annualmortgage").empty();
            $("#monthlyvacancy").empty();
            $("#annualvacancy").empty();
            $("#monthlytax").empty();
            $("#annualtax").empty();
            $("#monthlyinsurence").empty();
            $("#annualinsurence").empty();
            $("#monthlyfee").empty();
            $("#annualfee").empty();
            $("#monthlymaintenance").empty();
            $("#annualmaintenance").empty();
            $("#monthlycost").empty();
            $("#annualcost").empty();
            $("#monthlycashflow").empty();
            $("#annualcashflow").empty();
            $("#monthlyNOI").empty();
            $("#annualNOI").empty();
            $("#irr").empty();
            $("#totalprofit").empty();
            $("#cashoncash").empty();
            $("#PCR").empty();
            $("#totalrentalincome").empty();
            $("#totalmortgage").empty();
            $("#totalexpenses").empty();
            $("#netincome").empty();
			$(".resulttitle").empty();
			$(".firstyeartitle").empty();
            
           // Highcharts.js settings for the the pie chart.
           Highcharts.chart('chartplace', {
              chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
              },
              title: {
                text: ''
              },
              tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
              },
              plotOptions: {
                pie: {
                  allowPointSelect: true,
                  cursor: 'pointer',
                  dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                    style: {
                      color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                  }
                }
              },
              series: [{
                name: 'Percentage of Expenses:',
                colorByPoint: true,
                data: [{
                  name: 'Other Cost',
                  y: othercost_percent,
                  sliced: true,
                  selected: true
                }, {
                  name: 'Mortgage',
                  y: mortage_percent
                }, {
                  name: 'Vacancy',
                  y: vacancy_percent
                }, {
                  name: 'Management Fee',
                  y: managementfee_percent
                }, {
                  name: 'Property Tax',
                  y: propertytax_percent
                }, {
                  name: 'Total Insurance',
                  y: insurence_percent
                }, {
                  name: 'Maintenance Cost',
                  y: maintenance_percent
                }]
              }]
			});
			
            // The variables used to run calculations.
			var totalincome = 0;
			var totalmortgagepayments = 0;
			var totalexpenses = 0;
			var totalcashflow = 0;
			var totalcashoncash = 0;
			var totalequityaccumulated = 0;
            
            // Sets annual expenses.
			var annualexpenses;
			annualexpenses = +propertytaxcost + +insurencecost + +hoafeecost + +maintenancecost + +othercost;
            
			var annual_income, mortgage, expenses, cash_flow, cash_on_cash_return;
			annual_income = (+monthlyrent * 12); // 12000
			annual_income = annual_income + (+othermonthlyincome * 12);
			annual_income = (+annual_income - (+annual_income * (+vacancyrate / 100))); //11400
			annual_income = (+annual_income - (+annual_income * (+managementfee / 100))); // 10,260
			var realdownpayment = (+down_payment / 100) * +purchase_price;
			
			// Equity is the downpayment.
			var equity = +realdownpayment;
			// The total amount paid in mortage payments.
			var mortgage_payments_amount = (+fmp * 12) * +loan_term;
			// Equity purchased on every yearly mortgage payment.
			var equity_purchased_annually = ((+fmp * 12) * +purchase_price) / (+mortgage_payments_amount);
            
            var originmortgage = fmp;
            var origininterest = interest_rate;
            var unpaidbalance = (purchase_price - ((down_payment / 100) * purchase_price));
            var newequity = 0;
            var oldequity = 0;
            var newhousevalue = +new_value;
            var realinterest, unpaidbalancereduction;
            var appreciationprofit = 0;
			var bonusequity = 0;
			var cashinvested = 0;
            var othermonthlyincometotal = 0;
			cashinvested = +cashinvested - (+purchase_price * (+down_payment / 100));
			cashinvested = +cashinvested - +closing_cost - +repair_cost;
			
			if (+new_value > +purchase_price) {
				bonusequity = +bonusequity + (+new_value - +purchase_price);
			} else {
				new_value = +purchase_price;
			};
			
            var irrarray = [];
            var irrarray2 = [];
    
			$("<tr><td>Begin</td><td></td><td></td><td></td><td>$" + (+cashinvested).toFixed(2) + "</td><td></td><td></td><td></td><td></td></tr>").appendTo("#infotable");
            irrarray.push(parseFloat((cashinvested).toFixed(2)));
            irrarray2.push(parseFloat((cashinvested).toFixed(2)));
            var oldcashflow = 0;
            var roi_expenses = 0
            var roi_mortgage_payments = 0;
            var roi_moneymade = 0;
			
			for (var i = 1; i < (+holdinglength + 1); i++) {
				
                oldequity = newequity;
                
				if (i == (+loan_term + 1)) {
					fmp = 0;
				    mortage = 0;
					equity_purchased_annually = 0;
			    };
				var interestpayments = 0;
				var princplepayments = 0;
                for (var p = 1; p < 13; p++) {
						if (i <= loan_term) {
                        	realinterest = unpaidbalance * origininterest; // real interest represents INTEREST being paid, dummy!
							interestpayments = interestpayments + realinterest;
                        	unpaidbalancereduction = originmortgage - realinterest;
                        	unpaidbalance = unpaidbalance - unpaidbalancereduction;
                        	newequity = ((+new_value) - +unpaidbalance + +appreciationprofit);
						};
                    };
				newequity = newequity + (newhousevalue * (+valueappreciation / 100));
				totalequityaccumulated = totalequityaccumulated + newequity;
                var trueappreciationprofit = (+newhousevalue * (+valueappreciation / 100));
                appreciationprofit = appreciationprofit + (+newhousevalue * (+valueappreciation / 100));
                newhousevalue = +newhousevalue + (+newhousevalue * (+valueappreciation / 100));
             
				var annualexpenses;
				annualexpenses = +propertytaxcost + +insurencecost + +hoafeecost + +maintenancecost + +othercost;
				totalexpenses = totalexpenses + annualexpenses;
				
				var annual_income, mortgage, expenses, cash_flow, cash_on_cash_return;
				var managementfeecostvar;
                othermonthlyincometotal = (othermonthlyincome * 12) - ((othermonthlyincome * 12) * (+vacancyrate / 100));
    
                
				annual_income = (+monthlyrent * 12);
				annual_income = (+annual_income - (+annual_income * (+vacancyrate / 100)));
				annual_income = annual_income + othermonthlyincometotal;
                
                var othermonthlyincometotalcostvar = othermonthlyincometotal * (+managementfee / 100);
				
				// Monthly rent - vacancy + othermonthlyincome  * management fee = managementfeecost
				managementfeecostvar = ((+monthlyrent * 12) - ((+monthlyrent * 12) * (+vacancyrate / 100))) * (managementfee / 100);
				annual_income = (+annual_income - managementfeecostvar - othermonthlyincometotalcostvar);
				totalincome = totalincome + annual_income;
                
                
				cash_flow = +monthlyrent * 12;
			    cash_flow = cash_flow - (+fmp * 12);
			    cash_flow = cash_flow - ((+monthlyrent * 12) * +vacancyrate / 100);
				cash_flow = cash_flow + othermonthlyincometotal;
			    cash_flow = cash_flow - managementfeecostvar;
                cash_flow = cash_flow - othermonthlyincometotalcostvar;
				cash_flow = cash_flow - +annualexpenses;
                
                if (i > 1) {
                    oldcashflow = cash_flow;
                };
				
                if (i < holdinglength) {
                    irrarray.push(parseFloat((cash_flow).toFixed(2)));
                };
				
				cash_on_cash_return = (cash_flow / Math.abs(cashinvested)) * 100;
				
				var mortgageinterest = interestpayments;
				var mortgageprinciple = ((fmp * 12) - interestpayments);
				
				// Also known as "ROI".
				var thisyearequity;
                var cashtoreceive = newequity - (newhousevalue * (costtosell / 100));
                var newArray = irrarray2.slice();
                newArray.push(cash_flow + cashtoreceive);
                totalreturnIRR2 = (IRR(newArray) * 100).toFixed(2);
				// sellpriceofhome + cashflow - cashinvested
				roi_expenses = roi_expenses + annualexpenses;
                roi_mortgage_payments = roi_mortgage_payments + (fmp * 12);
                roi_moneymade =  roi_moneymade + cash_flow;
				var return_on_investment = (parseFloat(roi_moneymade) / (roi_expenses + roi_mortgage_payments)) * 100;
                
                if (i == 1) {
                    var oldcashflow = cash_flow;
                    var oldnetincome = annual_income - annualexpenses;
                };
                
                if (i == holdinglength) {
                    cash_flow = cash_flow + (newequity - (newequity * (costtosell / 100)));
					totalcashflow = totalcashflow + cash_flow;
                    irrarray.push(parseFloat((cash_flow).toFixed(2)));
					totalroi = ((parseFloat((totalcashflow)) - Math.abs(parseFloat((fmp * 12) * holdinglength))) / (Math.abs(parseFloat((fmp * 12) * holdinglength)))) * 100;
					totalcashflow = totalcashflow - Math.abs(cashinvested);
                } else {
					
					totalcashflow = totalcashflow + cash_flow;
                    
                };
			    expenses = +propertytaxcost + +insurencecost + +hoafeecost + +maintenancecost + +othercost;
				totalcashoncash = totalcashoncash + cash_on_cash_return;
				
            	console.log(totalcashflow);
				
                var totalreturnIRR = (IRR(irrarray) * 100).toFixed(2);
				mortgage = (fmp * 12);
				totalmortgagepayments = totalmortgagepayments + mortgage;
			    $("<tr><td>" + i + ".</td><br>" + "<td>$" + (+annual_income).toFixed(2) + "</td><td>$" + (+mortgage).toFixed(2) + "</td><td>$" + (+expenses).toFixed(2) + "</td><td>$" + (+cash_flow).toFixed(2) + "</td><td>" + (+return_on_investment).toFixed(2) + "%</td><td>$" + (+newequity).toFixed(2) + "</td><td>$" + (+cashtoreceive).toFixed(2) + "</td><td>" + totalreturnIRR2 + "%</td></tr>").appendTo("#infotable");
				
				var realtotalcashoncash = ((totalcashflow / Math.abs(cashinvested))) * Math.abs(cashinvested);
				// Year - Yearly Net Cash - Yearly New Equity - Yearly Total Return - Mortage Interest - Mortage Principle
			    $("<tr><td>" + i + ".</td><td>$" + (cash_flow).toFixed(2) + "</td><td>$" + (newequity - oldequity).toFixed(2) + "</td><td>$" + ((cash_flow) + (newequity - oldequity)).toFixed(2) + "</td><td>$" + (mortgageinterest).toFixed(2) + "</td><td>$" + (mortgageprinciple).toFixed(2) + "</td><td>" + (+cash_on_cash_return).toFixed(2) + "%</td></tr>").appendTo("#infotable2");
				
				mortgage_total = +fmp * loan_term;
				downpayment_and_mortgage = +down_payment + +mortgage_total;
                
                irrarray2.push(parseFloat((cash_flow).toFixed(2)));
				 
			    // This is where I update all form data for the next year's increases.
                if (propertytaxincrease > 0) {
                    propertytaxcost = updateCost(+propertytaxcost, +propertytaxincrease);
                };
                if (insurenceincrease > 0) {
                    insurencecost = updateCost(+insurencecost, +insurenceincrease);
                };
                if (hoafeeincrease > 0) {
                    hoafeecost = updateCost(+hoafeecost, +hoafeeincrease);
                };
                if (maintenanceincrease > 0) {
                    maintenancecost = updateCost(+maintenancecost, +maintenanceincrease);
                };
                if (otherincrease > 0) {
                    othercost = updateCost(+othercost, +otherincrease);
                };
                if (annualrentincrease > 0) {
                    monthlyrent = updateCost(+monthlyrent, +annualrentincrease);
                };
                if (otherincomeincrease > 0) {
                    othermonthlyincome = updateCost(othermonthlyincome, otherincomeincrease);
                };
                
            };
			
            
			totalcashoncash = (totalcashflow / Math.abs(cashinvested)) * 100;
			$("<tr><td>Result</td><td>$" + (totalincome).toFixed(2) + "</td><td>$" + (totalmortgagepayments).toFixed(2) + "</td><td>$" + (totalexpenses).toFixed(2) + "</td><td>$" + (totalcashflow).toFixed(2) + "</td><td></td><td>" + "" + "</td><td></td><td></td></tr>").appendTo("#infotable");
			
            
            $("#monthlyincome").append("$" + (firstmonthlyrent).toFixed(2));
            $("#annualincome").append("$" + (firstmonthlyrent * 12).toFixed(2));
            
            $("#monthlymortgage").append("$" + (fmp).toFixed(2));
            $("#annualmortgage").append("$" + (fmp * 12).toFixed(2));
            
            
            $("#monthlyvacancy").append("$" + (vacancy_cost / 12).toFixed(2));
            $("#annualvacancy").append("$" + (vacancy_cost).toFixed(2));
            
            $("#monthlytax").append("$" + (oldpropertytaxcost / 12).toFixed(2));
            $("#annualtax").append("$" + (oldpropertytaxcost / 1).toFixed(2));
            
            $("#monthlyinsurence").append("$" + (oldinsurencecost / 12).toFixed(2));
            $("#annualinsurence").append("$" + (oldinsurencecost / 1).toFixed(2));
           
            $("#monthlyfee").append("$" + (oldhoafeecost / 12).toFixed(2));
            $("#annualfee").append("$" + (oldhoafeecost / 1).toFixed(2));
            
            $("#monthlymaintenance").append("$" + (oldmaintenancecost / 12).toFixed(2));
            $("#annualmaintenance").append("$" + (oldmaintenancecost / 1).toFixed(2));
            
            $("#monthlycost").append("$" + (oldothercost / 12).toFixed(2));
            $("#annualcost").append("$" + (oldothercost / 1).toFixed(2));
            
            $("#monthlycashflow").append("$" + (oldcashflow / 12).toFixed(2));
            $("#annualcashflow").append("$" + (oldcashflow/ 1).toFixed(2));
            
            $("#monthlyROI").append("$" + (oldcashflow / 12).toFixed(2));
            $("#annualROI").append("$" + (oldcashflow/ 1).toFixed(2));
            
            $("#monthlyNOI").append("$" + (oldnetincome / 12).toFixed(2));
            $("#annualNOI").append("$" + (oldnetincome / 1).toFixed(2));
            
            
            // STOLEN FROM https://gist.github.com/ghalimi/4591338.
            function IRR(values, guess) {
              // Credits: algorithm inspired by Apache OpenOffice
              // Calculates the resulting amount
              var irrResult = function(values, dates, rate) {
                var r = rate + 1;
                var result = values[0];
                for (var i = 1; i < values.length; i++) {
                  result += values[i] / Math.pow(r, (dates[i] - dates[0]) / 365);
                }
                return result;
              }
              // Calculates the first derivation
              var irrResultDeriv = function(values, dates, rate) {
                var r = rate + 1;
                var result = 0;
                for (var i = 1; i < values.length; i++) {
                  var frac = (dates[i] - dates[0]) / 365;
                  result -= frac * values[i] / Math.pow(r, frac + 1);
                }
                return result;
              }
              // Initialize dates and check that values contains at least one positive value and one negative value
              var dates = [];
              var positive = false;
              var negative = false;
              for (var i = 0; i < values.length; i++) {
                dates[i] = (i === 0) ? 0 : dates[i - 1] + 365;
                if (values[i] > 0) positive = true;
                if (values[i] < 0) negative = true;
              }
              // Return error if values does not contain at least one positive value and one negative value
              if (!positive || !negative) return '#NUM!';
              // Initialize guess and resultRate
              var guess = (typeof guess === 'undefined') ? 0.1 : guess;
              var resultRate = guess;
              // Set maximum epsilon for end of iteration
              var epsMax = 1e-10;
              // Set maximum number of iterations
              var iterMax = 50;
              // Implement Newton's method
              var newRate, epsRate, resultValue;
              var iteration = 0;
              var contLoop = true;
              do {
                resultValue = irrResult(values, dates, resultRate);
                newRate = resultRate - resultValue / irrResultDeriv(values, dates, resultRate);
                epsRate = Math.abs(newRate - resultRate);
                resultRate = newRate;
                contLoop = (epsRate > epsMax) && (Math.abs(resultValue) > epsMax);
              } while(contLoop && (++iteration < iterMax));
              if(contLoop) return '#NUM!';
              // Return internal rate of return
              return resultRate;
            }
    
        var totalreturnIRR = (IRR(irrarray) * 100).toFixed(2) + "%";
        var purchasecapitalizationrate = ((+oldnetincome / +purchase_price) * 100).toFixed(2) + "%";
        var totalreturnprofit = (totalcashflow).toFixed(2);
        var totalcashoncashreturn = (totalcashoncash).toFixed(2) + "%";
        var totalrentalincome = "$" + (totalincome).toFixed(2);
        var totalmortgage = "$" + (totalmortgagepayments).toFixed(2);
        var totaloverallexpenses = "$" + (totalexpenses).toFixed(2);
        var totalnetoperatingincome = "$" + (totalincome - totalexpenses).toFixed(2);
            
        $("#irr").append(totalreturnIRR);
        $("#totalprofit").append("$" + totalreturnprofit);
        $("#cashoncash").append((cash_on_cash_return).toFixed(2) + "%");
        $("#PCR").append(purchasecapitalizationrate);
        $("#totalrentalincome").append(totalrentalincome);
        $("#totalmortgage").append(totalmortgage);
        $("#totalexpenses").append(totaloverallexpenses);
        $("#netincome").append(totalnetoperatingincome);
            
            
        // Remember how I hid the tables at the very beginning? Well, this shows them.
        $(".table").show();
        $(".table2").show();
        $(".table3").show();
		$("#result").show();
		$(".resulttitle").show();
		$("#chartplace").show();
		$(".resulttitle").append("For The " + holdinglength + " Years Invested:");
		$(".firstyeartitle").append("First Year Income and Expenses:");
		$(".firstyearexpensebreakdown").show();
		$(window).scrollTop(1000);
        } 
    });
});