    <!-- Added a few required script sources. -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
	<script src="https://code.highcharts.com/modules/exporting.js"></script>
	<script src="https://code.highcharts.com/modules/export-data.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    
     <!-- Styling for the application. Some styling is too broad. Will need to fix later. -->
    <style>
		#btAdd {
			background-color: #508026;
			color: #ffffff;
			width: 100px;
			height: 50px;
			font-weight: bold;
			
		}
		
		#autofill {
			width: 100px;
			height: 50px;
			font-weight: bold;
		}
		#myProfile { 
			width: 850px;
            margin: auto;
		}
        .divText {
            padding:2px 0;
        }
        
        .highcharts-contextmenu, .highcharts-button-symbol {
            display: none !important;
        }
        
        td {
            border: 1px solid #666;
            text-align: center;
			font-weight: normal;
        }
        th {
            text-align: center;
            border: 1px solid #666;
			font-weight: normal;
			
        }
		#result {
			background-color: #528427;
			color: #ffffff;
			font-size: 22px;
			padding: 5px;
			width: 100%;
		}
		.resulttitle, .firstyeartitle, .firstyearexpensebreakdown {
			font-size: 19px;
			font-weight: bold;
			
		}
		#calctitle {
			color: #003366;
			font-size: 26px;
			font-weight: bold;
			padding: 0;
			margin: 12px 0;
		}
		
		.table2 th {
			width: 100%;
			padding-left: 5px;
			padding-right: 5px;
		}
		
		.table3 th {
			width: 100%;
			padding-left: 5px;
			padding-right: 5px;
		}
		
		#chartplace {
			width: 500px;
			margin-top: 0px;
			padding-top: 0px;
		}
		
		.highcharts-credits {
			display: none;
		}
		
		#infotable th {
			padding-left: 5px;
			padding-right: 5px;
		}
		
		.table th {
			padding-left: -10px;
			padding-right: -10px;
			text-align: center;
			vertical-align: middle;
			background-color: #DFF0FE;
			font-weight: bold;
			
		}
		.table {
			font-size: 15px;
		}
		.table thead tr {
			border-bottom: 3px solid #666;
		}
		
		.table2 thead tr {
			border-bottom: 3px solid #666;
		}
		#annualrentincrease, #otherincomeincrease {
			width: 50px;
		}
		
		.sectiontitle {
			background-color: #326699;
			color: #ffffff;
			width: 100%;
			padding: 6px;
			font-size: 18px !important;
		}
		div input {
			width: 100%;
		}
    </style>
<!-- The container body holds the calculator. It also takes up half the screen. -->    
    <div id="myProfile" class="container col-12">
	<br>
	<h1 id = "calctitle">Rental Property Calculator</h1>
	<div class="row">
	  <div class="col-sm-6">
		  <div class = "sectiontitle">Purchase</div>
          <!-- This div holds the the inputs required for calculating rental data.-->
			<div id="purchase">
				<div class="row">
					<div class="col-sm-6">
						<label>Purchase Price:</label>
					</div>
					<div class="col-sm-6">
						<input type="text" id="purchase_price" placeholder="Purchase Price">
					</div>
				</div>
				
				<div class="row">
					<div class="col-sm-6">
						<label>Down Payment:</label>
					</div>
					<div class="col-sm-6">
						<input type="text" id="down_payment" placeholder = "%">
					</div>
				</div>
				
				<div class="row">
					<div class="col-sm-6">
						<label>Interest Rate</label>
					</div>
					<div class="col-sm-6">
						<input type="text" id="interest_rate" placeholder = "%">
					</div>
				</div>
				
				<div class="row">
					<div class="col-sm-6">
						<label>Loan Term:</label>
					</div>
					<div class="col-sm-6">
						<input type="text" id="loan_term" placeholder = "In Years">
					</div>
				</div>
				
				<div class="row">
					<div class="col-sm-6">
						<label>Closing Cost</label>
					</div>
					<div class="col-sm-6">
						<input type="text" id="closing_cost" placeholder = "$">
					</div>
				</div>
				
				<div class="row">
					<div class="col-sm-6">
						<label>Repair Cost</label>
					</div>
					<div class="col-sm-6">
						<input type="text" id="repair_cost" placeholder = "$">
					</div>
				</div>
				
				<div class="row">
					<div class="col-sm-6">
						<label>Value After Repairs</label>
					</div>
					<div class="col-sm-6">
						<input type="text" id="new_value" placeholder = "$">
					</div>
				</div>
			</div>
	  </div>
		
	  <div class="col-sm-6">
		  <div class = "sectiontitle">Income</div>
			<div id="income">
				<div class="row">
					<div class="col-sm-9"></div>
					<div class="col-sm-3">
						<label>Annual Increase</label>
					</div>
				</div>
				
				<div class="row">
					<div class="col-sm-6">
						<label>Monthly Rent:</label> 
					</div>
					<div class="col-sm-3">
						<input type="text" id="monthlyrent" placeholder="$">  
					</div>
					<div class="col-sm-2">
						<input type="text" id="annualrentincrease" placeholder="%">
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6">
						<label>Other Monthly Income:</label>
					</div>
					<div class="col-sm-3">
						<input type="text" id="othermonthlyincome" placeholder="$">
					</div>
					<div class="col-sm-2">
						<input type="text" id="otherincomeincrease" placeholder="%">
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-sm-6">
						<label>Vacancy Rate:</label>
					</div>
					<div class="col-sm-6">
						<input type="text" id="vacancyrate" placeholder="%">
					</div>
				</div>
				
				<div class="row">
					<div class="col-sm-6">
						<label>Management Fee:</label>
					</div>
					<div class="col-sm-6">
						<input type="text" id="managementfee" placeholder="%">
					</div>
				</div>
			</div>
	  </div>
	</div>
	
	<div class="row">
	  <div class="col-sm-6">
		<div class = "sectiontitle">Recurring Operating Expenses</div>
			<div id="expenses">
				
				<div class="row">
					<div class="col-sm-5">
					</div>
					<div class="col-sm-4">
						<label><br>Annual</label>
					</div>
					<div class="col-sm-3">
						<label>Annual Increase</label>
					</div>
				</div>
				
				<div class="row">
					<div class="col-sm-5">
						<label>Property Tax:</label>
					</div>
					<div class="col-sm-4">
						<input type="text" id="propertytaxcost" placeholder="Cost">
					</div>
					<div class="col-sm-3">
						<input type="text" id="propertytaxincrease" placeholder="%">
					</div>
				</div>
				<div class="row">
					<div class="col-sm-5">
						<label>Total Insurence:</label>
					</div>
					<div class="col-sm-4">
						<input type="text" id="insurencecost" placeholder="Cost">
					</div>
					<div class="col-sm-3">
						<input type="text" id="insurenceincrease" placeholder="%">
					</div>
				</div>
				
				<div class="row">
					<div class="col-sm-5">
						<label>HOA Fee:</label>
					</div>
					<div class="col-sm-4">
						<input type="text" id="hoafeecost" placeholder="Cost">
					</div>
					<div class="col-sm-3">
						<input type="text" id="hoafeeincrease" placeholder="%">
					</div>
				</div>
				<div class="row">
					<div class="col-sm-5">
						<label>Maintenance:</label>
					</div>
					<div class="col-sm-4">
						<input type="text" id="maintenancecost" placeholder="Cost">
					</div>
					<div class="col-sm-3">
						<input type="text" id="maintenanceincrease" placeholder="%">
					</div>
				</div>
				<div class="row">
					<div class="col-sm-5">
						<label>Other Costs:</label>
					</div>
					<div class="col-sm-4">
						<input type="text" id="othercost" placeholder="Cost">
					</div>
					<div class="col-sm-3">
						<input type="text" id="otherincrease" placeholder="%">
					</div>
				</div>
				<br>
			</div>
		</div>
		  <div class="col-sm-6">
			<div class = "sectiontitle">Sell</div>
			<div id="sell">
				<div class="row">
					<div class="col-sm-6">
						<label>Value Appreciation:</label>
					</div>
					<div class="col-sm-6">
						<input type="text" id="valueappreciation" placeholder="% Per Year">
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6">
						<label>Holding Length:</label> 
					</div>
					<div class="col-sm-6">
						<input type="text" id="holdinglength" placeholder="Years">
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6">
						<label>Cost to Sell:</label> 
					</div>
					<div class="col-sm-6">
						<input type="text" id="costtosell" placeholder="% Of Sale Price"> 
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-sm-2"></div>
					<div class="col-sm-9"><input type="button" id="btAdd" value="Calculate" style="margin:10px 0;" /><input type="button" id="autofill" value="Auto Fill" style="margin:10px 0;" /></div>
				</div>
			</div>
		</div>
	</div>
	<br>
<br>
	<div id = "result">Result</div>
    <br>
	<div class="row">
    <div class="col-sm-6">
      <div class="table-responsive">  

 <!-- Table3 holds the information left over after the owning period is up. Displays final data. -->
  <table class="table3">
	 <div class = "resulttitle"></div>
    <tbody>
        <tr>
            <th>Return (IRR):</th>
            <th id = "irr">123</th>
        </tr>
        <tr>
            <th>Total Profit when Sold:</th>
            <th id = "totalprofit">123</th>
        </tr>
        <tr>
            <th>Total ROI:</th>
            <th id = "cashoncash">123</th>
        </tr>
        <tr>
            <th>Purchase Capitalization Rate:</th>
            <th id = "PCR">123</th>
        </tr>
        <tr>
            <th>Total Rental Income:</th>
            <th id = "totalrentalincome">123</th>
        </tr>
        <tr>
            <th>Total Mortgage Payments:</th>
            <th id = "totalmortgage">123</th>
        </tr>
        <tr>
            <th>Total Expenses:</th>
            <th id = "totalexpenses">123</th>
        </tr>
        <tr>
            <th>Total Net Operating Income:</th>
            <th id = "netincome">123</th>
        </tr>
    </tbody>
  </table>
</div>
    </div>
    <div class="col-sm-6">
      <div class="table-responsive">
          
           <!-- Table2 shows general data for each year. -->
          
		  <table class="table2">
			<div class = "firstyeartitle"></div>
			<thead>
			  <tr style = "background-color: #DFF0FE;">
				<th></th>
				<th>Monthly</th>
				<th>Annual</th>
			  </tr>
			</thead>
			<tbody>
				<tr>
					<th>Income:</th>
					<th id = "monthlyincome">123</th>
					<th id = "annualincome">123</th>
				</tr>
				<tr>
					<th>Mortgage Pay:</th>
					<th id = "monthlymortgage">123</th>
					<th id = "annualmortgage">123</th>
				</tr>
				<tr>
					<th>Vacancy:</th>
					<th id = "monthlyvacancy">123</th>
					<th id = "annualvacancy">123</th>
				</tr>
				<tr>
					<th>Property Tax:</th>
					<th id = "monthlytax">123</th>
					<th id = "annualtax">123</th>
				</tr>
				<tr>
					<th>Total Insurence:</th>
					<th id = "monthlyinsurence">123</th>
					<th id = "annualinsurence">213</th>
				</tr>
				<tr>
					<th>HOA Fee:</th>
					<th id = "monthlyfee">123</th>
					<th id = "annualfee">123</th>
				</tr>
				<tr>
					<th>Maintenance Cost:</th>
					<th id = "monthlymaintenance">123</th>
					<th id = "annualmaintenance">123</th>
				</tr>
				<tr>
					<th>Other Cost:</th>
					<th id = "monthlycost">123</th>
					<th id = "annualcost">123</th>
				</tr>
				<tr>
					<th>Cash Flow:</th>
					<th id = "monthlycashflow">123</th>
					<th id = "annualcashflow">123</th>
				</tr>
				<tr>
					<th>Net Operating Income (NOI):</th>
					<th id = "monthlyNOI">123</th>
					<th id = "annualNOI">123</th>
				</tr>
			</tbody>
		  </table>
		</div>
	</div>
</div>
<div class = "firstyearexpensebreakdown">First Year Expense Breakdown:</div>
<div id = "chartplace"></div>

  <!-- Table lists data that increments over a series of years.-->
  <table class="table table-responsive" style = "width: 100% !important;">
    <thead style = "width: 100% !important;">
      <tr style="height:5px">
        <th rowspan="2" valign="top">Year</th>
        <th rowspan="2" valign="top">Annual Income</th>
        <th rowspan="2" valign="top">Mortgage</th>
        <th rowspan="2" valign="top">Expenses</th>
        <th rowspan="2" valign="top">Cash Flow</th>
        <th rowspan="2" valign="middle">ROI</th>
        <th rowspan="2" valign="middle">Equity Accumulated</th>
        <th colspan="2" align="center">If Sold at Year End</th>
      </tr>
	  <tr>
		  <td style = "background-color: #DFF0FE; font-weight: bold; padding: 0px;">Cash to Receive</td><td style = "background-color: #DFF0FE; font-weight: bold; padding: 0px;">Return (IRR)</td>
	  </tr>
    </thead>
    <tbody id = "infotable" style = "width: 100% !important;">
    </tbody>
  </table>
		
		
  <!-- Table lists data that increments over a series of years.-->
  <table class="table table-responsive" style = "width: 100% !important;">
    <thead style = "width: 100% !important;">
      <tr style="height:5px">
		<th rowspan="2" valign="top">Year</th>
        <th rowspan="2" valign="top">Yearly Net Cash</th>
		<th rowspan="2" valign="top">Yearly New Equity</th>
		<th rowspan="2" valign="top">Yearly Total Return</th>
        <th rowspan="2" valign="top">Mortage Interest</th>
		<th rowspan="2" valign="top">Mortage Principle</th>
	  </tr>
    </thead>
    <tbody id = "infotable2" style = "width: 100% !important;">
    </tbody>
  </table>

</div>
    <br>
    <!-- This generic sounding id "container" will display the pie chart of calculated data..-->
    <div id="container" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>   
 <!-- The beginning of JavaScript code.-->