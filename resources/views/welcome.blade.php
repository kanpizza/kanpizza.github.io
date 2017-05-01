<!-- <!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>LearningVueJs</title>

</head>
<body>
<div class="container" id="vue-app">
  <section class="hero is-primary">

  <div class="hero-body">
    <div class="container">
      <h1 class="title" >
          COMPUTED GPA ONLINE PROGRAM
      </h1>
    </div>
  </div>
</div>
  <div class="field">
  <label class="label">NUMBER OF SUBJECT</label>
  <p class="control">
    <input v-model="formNumber.number" class="input" type="text" maxlength="4" size="4"  placeholder="Text input">
  </p>
</div>
</div>
</section>
<button class="button is-large button is-danger" v-on:click="show()">Sumbit</button>


</body>
</html> -->
<!doctype html>
<html lang="en">
<link rel="stylesheet" media="screen" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.4.1/css/bulma.css">

<head>
<title>GPA ONLINE</title>
<meta charset="utf-8">
<meta http-equiv="content-language" content="th">
<meta name="country" content="th">
<meta name="robots" content="index, follow">
<meta name="robots" content="nocache">
<!-- disable iPhone inital scale -->
<meta name="viewport" content="width=device-width; initial-scale=1.0">
 <meta name="viewport" content="width=device-width, initial-scale=1">
        <script>
            function isNumber(n) {
                return !isNaN(parseFloat(n)) && isFinite(n);
            }

            function gen_table() {
                var total_subject = $('#total_subject').val();
                if (isNumber(total_subject)) {
                    if ($('.control-group').is('.error')) {
                        $('.control-group').removeClass('error');
                    }

                    $('#table_display').html("");
                    total_subject = parseInt(total_subject);
                    if (total_subject > 0) {
                        $('.table').show().animate({'opacity':'1'},800);
                    } else {
                        $('.table').hide().css({'opacity':'0'});
                    }
                    for (var i = 0; i < total_subject; i++) {
                        str = "<tr><td>" + (i + 1) + "</td><td><input type='text' size=6 id='name_" + i + "'  class='content-box-program-inputbox'></td><td><input type='text' size=7 class='content-box-program-inputbox' id='credit_" + i + "'></td><td><input type='text' size=4 id='grade_" + i + "' class='content-box-program-inputbox'></td></tr>";
                        $('#table_display').append(str);
                    }
                    $('#gen_submit').addClass("btn-danger").text("submit");
                } else {
                    $('.control-group').addClass('error');
                    $('.table').hide().css({'opacity':'0'});
                }
            }

            function cal_grade() {
            	var grade = $("#grade").val();
                var total_subject = $('#total_subject').val();
                var all_weight = 0, got_weight = 0;
                if (isNumber(total_subject)) {
                    total_subject = parseInt(total_subject);
                    for (i = 0; i < total_subject; i++) {
                        var ec = $('#credit_' + i);
                        var es = $('#grade_' + i);
                        if (!isNumber(ec.val())) {
                            alert("incorrect to credit");
                            ec.focus();
                            return;
                        } else {
                            if (parseFloat(ec.val()) <= 0.0) {
                                alert("incorrect to credit");
                                ec.focus();
                                return;
                            }
                        }

                        if (!isNumber(es.val())) {
                            alert("incorect to grade");
                            es.focus();
                            return;
                        } else {
                            if (parseFloat(es.val()) <= 0.0 || parseFloat(es.val()) > 4.0) {
                                alert("incorect to grade");
                                es.focus();
                                return;
                            }
                        }

                        all_weight += parseFloat(ec.val());
                        got_weight += parseFloat(ec.val()) * parseFloat(es.val());
                    }
                    var calculated = (got_weight / all_weight).toFixed(2);
                    $('#grade').text("GPA" + calculated);
                    var grade = calculated;
                    $("#grade").val(grade);
                }
            }

            $(function() {
                $('.table').hide().css({'opacity':'0'});

                $('.request').submit(function() {
                    gen_table();
                    return false;
                });

                $('#grade').click(function() {
                    cal_grade();
                    $(this).removeClass('btn-primary').addClass('btn-success');
                });
            });
function printpage()
  {
  window.print()
  }
        </script>


</head>

<body>

<div id="pagewrap">
	<div id="content">

		<article class="post clearfix">


			<header>
				<center><h1 class="post-title">GPA ONLINE</h1></center>
			</header>
			<br>
<center>
                    <form class="request">
                        <span class="add-on"><b>Number of subject</b></span>
                        <input size=1 class="content-box-program-inputbox" id="total_subject" type="text">
                        <button class="content-box-program-bottoncalc" type="submit" id="gen_submit">submit</button>
                    </form>

                <table class="table table-condensed" >
                    <thead>
                        <tr>
                            <th> </th>
                            <th>ชื่อวิชา</th>
                            <th style="text-align:center;">credit</th>
                            <th style="text-align:center;">grade</th>
                        </tr>
                    </thead>
                    <tbody id="table_display" ></tbody>
                    <tfoot>
                        <tr>
                        	<td></td>
                        	<td></td>
                        	<td style="text-align: left;">
                                <input type=button value='คำนวณ' onclick=cal_grade(); class='content-box-program-bottoncalc'>
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                        	<td>&nbsp;</td>
                        	<td>&nbsp;</td>
                        	<td>&nbsp;</td>
                        	<td>&nbsp;</td>
                        </tr>
                        <tr>
                        	<td>&nbsp;</td>
                        	<td>&nbsp;</td>
                        	<td>&nbsp;</td>
                        	<td>&nbsp;</td>
                        </tr>
                         <tr>
                        	<td></td>
                       	<td style="text-align: right;">GPA</td>
                        	<td><input type=text size=5 id='grade' readonly class='content-box-program-inputbox'></td>
                        	<td></td>
                        </tr>
                        <tr>
                        	<td>&nbsp;</td>
                        	<td>&nbsp;</td>
                        	<td style="text-align: right;"><input type="button" value="  Print  " onclick="printpage()" size='20'></td>
                        	 <td>&nbsp;</td>
                        </tr>
                    </tfoot>
                </table>


</center>

		</article>

	</div>

</div>
</body>
</html>
