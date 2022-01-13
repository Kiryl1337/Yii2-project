<html>

<head>
<meta http-equiv=Content-Type content="text/html; charset=windows-1251">
<meta name=Generator content="Microsoft Word 15 (filtered)">
<title>Задание</title>
    <script>
        function Export2Doc(element, filename = ''){
            var preHtml = "<html xmlns:o='urn:schemas-microsoft-com:office:office' xmlns:w='urn:schemas-microsoft-com:office:word' xmlns='http://www.w3.org/TR/REC-html40'><head><meta charset='utf-8'><title>Export HTML To Doc</title></head><body>";
            var postHtml = "</body></html>";
            var html = preHtml+document.getElementById(element).innerHTML+postHtml;

            var blob = new Blob(['\ufeff', html], {
                type: 'application/msword'
            });

            // Specify link url
            var url = 'data:application/vnd.ms-word;charset=utf-8,' + encodeURIComponent(html);

            // Specify file name
            filename = filename?filename+'.doc':'document.doc';

            // Create download link element
            var downloadLink = document.createElement("a");

            document.body.appendChild(downloadLink);

            if(navigator.msSaveOrOpenBlob ){
                navigator.msSaveOrOpenBlob(blob, filename);
            }else{
                // Create a link to the file
                downloadLink.href = url;

                // Setting the file name
                downloadLink.download = filename;

                //triggering the function
                downloadLink.click();
            }

            document.body.removeChild(downloadLink);
        }
    </script>
<style>
<!--
 /* Font Definitions */
 @font-face
	{font-family:"Cambria Math";
	panose-1:2 4 5 3 5 4 6 3 2 4;}
 /* Style Definitions */
 p.MsoNormal, li.MsoNormal, div.MsoNormal
	{margin:0cm;
	margin-bottom:.0001pt;
	font-size:10.0pt;
	font-family:"Times New Roman",serif;}
h1
	{margin:0cm;
	margin-bottom:.0001pt;
	text-align:right;
	page-break-after:avoid;
	font-size:11.0pt;
	font-family:"Times New Roman",serif;}
h2
	{margin:0cm;
	margin-bottom:.0001pt;
	text-align:center;
	page-break-after:avoid;
	font-size:12.0pt;
	font-family:"Times New Roman",serif;
	font-weight:normal;}
h3
	{margin:0cm;
	margin-bottom:.0001pt;
	text-align:center;
	page-break-after:avoid;
	font-size:10.0pt;
	font-family:"Times New Roman",serif;}
p.MsoList, li.MsoList, div.MsoList
	{margin-top:0cm;
	margin-right:0cm;
	margin-bottom:0cm;
	margin-left:14.15pt;
	margin-bottom:.0001pt;
	text-indent:-14.15pt;
	font-size:10.0pt;
	font-family:"Times New Roman",serif;}
p.MsoBodyText, li.MsoBodyText, div.MsoBodyText
	{margin:0cm;
	margin-bottom:.0001pt;
	font-size:14.0pt;
	font-family:"Times New Roman",serif;}
p.MsoBodyTextIndent, li.MsoBodyTextIndent, div.MsoBodyTextIndent
	{margin-top:0cm;
	margin-right:0cm;
	margin-bottom:0cm;
	margin-left:42.0pt;
	margin-bottom:.0001pt;
	text-align:justify;
	text-indent:17.85pt;
	text-autospace:none;
	font-size:14.0pt;
	font-family:"Times New Roman",serif;}
p.MsoBodyText2, li.MsoBodyText2, div.MsoBodyText2
	{margin:0cm;
	margin-bottom:.0001pt;
	line-height:150%;
	font-size:14.0pt;
	font-family:"Times New Roman",serif;
	font-style:italic;
	text-decoration:underline;}
p.MsoBodyText3, li.MsoBodyText3, div.MsoBodyText3
	{margin:0cm;
	margin-bottom:.0001pt;
	text-align:justify;
	font-size:8.0pt;
	font-family:"Times New Roman",serif;}
 /* Page Definitions */
 @page WordSection1
	{size:595.3pt 841.9pt;
	margin:42.55pt 42.55pt 45.35pt 3.0cm;}
div.WordSection1
	{page:WordSection1;}
-->
</style>

</head>
<div id="exportContent">
<body lang=RU>

<div class=WordSection1>

<p class=MsoBodyTextIndent align=center style='margin-left:0cm;text-align:center;
text-indent:0cm'><b>Учреждение образования</b></p>

<p class=MsoBodyTextIndent align=center style='margin-left:0cm;text-align:center;
text-indent:0cm'><b>«Гомельский государственный университет </b></p>

<p class=MsoBodyTextIndent align=center style='margin-left:0cm;text-align:center;
text-indent:0cm'><b>имени Франциска Скорины»</b></p>

<p class=MsoBodyTextIndent align=center style='margin-left:0cm;text-align:center;
text-indent:0cm'><b><span style='font-size:11.0pt'>&nbsp;</span></b></p>

<p class=MsoBodyTextIndent align=center style='margin-left:0cm;text-align:center;
text-indent:0cm'>Факультет <?= $model->teacher->department->faculty->faculty_name?></p>

<p class=MsoNormal align=center style='text-align:center'><i><span
style='font-size:11.0pt'>&nbsp;</span></i></p>

<p class=MsoNormal align=center style='text-align:center'><span
style='font-size:14.0pt'>Кафедра <?= $model->teacher->department->department_name?></span></p>

<p class=MsoNormal><b>&nbsp;</b></p>

<p class=MsoNormal><b>&nbsp;</b></p>

<p class=MsoNormal align=center style='text-align:center'><i><span
style='font-size:11.0pt'>&nbsp;</span></i></p>

<h1 align=center style='margin-right:-.1pt;text-align:center'>                                                      
                  <span style='font-size:12.0pt'>             Утверждаю</span></h1>

<p class=MsoNormal align=right style='text-align:right'><b><span
style='font-size:12.0pt'>&nbsp;</span></b></p>

<p class=MsoNormal align=right style='text-align:right'><b><span
style='font-size:12.0pt'>&nbsp;</span></b></p>

<p class=MsoNormal align=right style='text-align:right'><b><span
style='font-size:12.0pt'>                        </span></b><span
style='font-size:12.0pt'>Зав. кафедрой_________________В.С. Смородин</span></p>

<p class=MsoNormal align=right style='text-align:right'><span style='font-size:
12.0pt'>                        </span></p>

<p class=MsoNormal align=center style='text-align:center'><span
style='font-size:12.0pt'>                                                            «_____»______________________20</span><span
lang=EN-US style='font-size:12.0pt'>19 </span><span style='font-size:12.0pt'>г.</span></p>

<p class=MsoNormal align=right style='text-align:right'><span style='font-size:
11.0pt'>                                      <i>                                   </i></span></p>

<p class=MsoNormal align=right style='text-align:right'><span style='font-size:
11.0pt'>&nbsp;</span></p>

<p class=MsoNormal align=right style='text-align:right'><span style='font-size:
11.0pt'>&nbsp;</span></p>

<h3 align=right style='text-align:right'><span style='font-size:11.0pt'>&nbsp;</span></h3>

<h3><span style='font-size:16.0pt'>З А Д А Н И Е</span></h3>

<p class=MsoNormal align=center style='text-align:center'><b><span
style='font-size:14.0pt'>по курсовой работе </span></b></p>

<p class=MsoNormal align=center style='text-align:center'><b><span
style='font-size:14.0pt'>по курсу «Базы данных»</span></b></p>

<p class=MsoNormal align=center style='text-align:center'><b><span
style='font-size:14.0pt'>&nbsp;</span></b></p>

<p class=MsoNormal><span style='font-size:14.0pt'>Студенту <i><u>     гр. <?=$model->group->name?>    
  <span style='color:black'><?php foreach ($rowsForStudent as $row): ?>
                        <?= $row ?>
                    <?php endforeach; ?>                                                             </span></u></i></span></p>

<p class=MsoNormal align=center style='text-align:center'><i>&nbsp;</i></p>

<p class=MsoNormal align=center style='text-align:center'><i>&nbsp;</i></p>

<p class=MsoNormal align=center style='text-align:center'><i>&nbsp;</i></p>

<p class=MsoNormal style='line-height:150%'><span style='font-size:14.0pt;
line-height:150%'>1  Тема курсовой работы <i><u>     <span style='color:black'>Разработка
учебного проекта «<?=$model->title?>»                                                                          </span></u></i></span></p>

<p class=MsoNormal style='text-align:justify'><span style='font-size:14.0pt'>&nbsp;</span></p>

<p class=MsoNormal><span style='font-size:14.0pt'>2  Срок сдачи работы студентом  
«<i><u> 05 </u></i>»<i><u>    мая    </u></i> 201<i><u> 9 </u></i> г.</span></p>

<p class=MsoNormal><span style='font-size:14.0pt'>&nbsp;</span></p>

<p class=MsoNormal style='line-height:150%'><span style='font-size:14.0pt;
line-height:150%'>3  Исходные данные к курсовой работе  ________________________________</span></p>


    <ol>
<?php foreach ($model->sources as $source){ ?>
            <li><p class=MsoList style='margin-left:0cm;text-indent:0cm;line-height:150%'><i><u><span
                        style='font-size:14.0pt;line-height:150%'>     <span style='font-size:14.0pt;line-height:150%;color:black'> <?php echo $source->source_name;?></span></span></u></i></p></li>

<?}?>
    </ol>


<p class=MsoList style='margin-left:0cm;text-indent:0cm;line-height:150%'><i><u><span
style='font-size:14.0pt;line-height:150%'>                                                                                                                                  _</span></u></i></p>

<p class=MsoNormal style='line-height:150%'><span style='font-size:14.0pt;
line-height:150%'>4  Перечень подлежащих разработке вопросов  __________________________</span></p>

<p class=MsoList style='margin-left:0cm;text-indent:0cm;line-height:150%'><i><u><span
style='font-size:14.0pt;line-height:150%'>     1. Назначение разрабатываемой
системы                                                     _</span></u></i></p>

<p class=MsoList style='margin-left:0cm;text-indent:0cm;line-height:150%'><i><u><span
style='font-size:14.0pt;line-height:150%'>     <span style='color:black'>2. </span></span></u></i><i><u><span
style='font-size:14.0pt;line-height:150%;color:black'>Операторы языка хранимых
процедур в среде </span></u></i><i><u><span lang=EN-US style='font-size:14.0pt;
line-height:150%;color:black'>MS</span></u></i><i><u><span lang=EN-US
style='font-size:14.0pt;line-height:150%;color:black'> </span></u></i><i><u><span
lang=EN-US style='font-size:14.0pt;line-height:150%;color:black'>SQL</span></u></i><i><u><span
lang=EN-US style='font-size:14.0pt;line-height:150%;color:black'> </span></u></i><i><u><span
lang=EN-US style='font-size:14.0pt;line-height:150%;color:black'>Server</span></u></i><i><u><span
lang=EN-US style='font-size:14.0pt;line-height:150%'> </span></u></i><i><span
style='font-size:14.0pt;line-height:150%'>_________</span></i></p>

<p class=MsoList style='margin-left:0cm;text-indent:0cm;line-height:150%'><i><u><span
style='font-size:14.0pt;line-height:150%'>     3. Структура базы данных
системы                                                              _    </span></u></i></p>

<p class=MsoList style='margin-left:0cm;text-indent:0cm;line-height:150%'><i><u><span
style='font-size:14.0pt;line-height:150%'>     4. Схема диалога пользователя с
системой                                                   _ </span></u></i></p>

<p class=MsoList style='margin-left:0cm;text-indent:0cm;line-height:150%'><i><u><span
style='font-size:14.0pt;line-height:150%'>                                                                                                                                  _</span></u></i></p>

<p class=MsoList style='margin-left:0cm;text-indent:0cm;line-height:150%'><i><u><span
style='font-size:14.0pt;line-height:150%'>                                                                                                                                  _</span></u></i></p>

<p class=MsoNormal><span style='font-size:14.0pt'>__________________________________________________________________</span></p>

<p class=MsoBodyText>&nbsp;</p>

<p class=MsoBodyText>5  Календарный план работ с указанием сроков выполнения
отдельных этапов</p>

<p class=MsoNormal style='text-align:justify'><span style='font-size:11.0pt'>&nbsp;</span></p>

<table class=MsoNormalTable border=1 cellspacing=0 cellpadding=0
 style='margin-left:5.4pt;border-collapse:collapse;border:none'>
 <tr style='page-break-inside:avoid;height:64.8pt'>
  <td width=76 style='width:2.0cm;border:solid windowtext 1.0pt;border-bottom:
  double windowtext 1.5pt;padding:0cm 5.4pt 0cm 5.4pt;height:64.8pt'>
  <p class=MsoNormal align=center style='text-align:center'><span
  style='font-size:12.0pt'>Этапы выполнения работы</span></p>
  </td>
  <td width=274 style='width:205.55pt;border-top:solid windowtext 1.0pt;
  border-left:none;border-bottom:double windowtext 1.5pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:64.8pt'>
  <h2>Содержание выполняемой работы</h2>
  </td>
  <td width=95 style='width:70.9pt;border-top:solid windowtext 1.0pt;
  border-left:none;border-bottom:double windowtext 1.5pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:64.8pt'>
  <p class=MsoNormal align=center style='text-align:center'><span
  style='font-size:12.0pt'>Сроки представления материала</span></p>
  </td>
  <td width=94 style='width:70.85pt;border-top:solid windowtext 1.0pt;
  border-left:none;border-bottom:double windowtext 1.5pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:64.8pt'>
  <p class=MsoNormal align=center style='text-align:center'><span
  style='font-size:12.0pt'>Отметка о выполнении этапа работы</span></p>
  </td>
  <td width=85 style='width:63.8pt;border-top:solid windowtext 1.0pt;
  border-left:none;border-bottom:double windowtext 1.5pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:64.8pt'>
  <p class=MsoNormal align=center style='text-align:center'><span
  style='font-size:12.0pt'>Подпись</span></p>
  <p class=MsoNormal align=center style='text-align:center'><span
  style='font-size:12.0pt'>руководителя</span></p>
  </td>
 </tr>
 <tr style='page-break-inside:avoid;height:28.0pt'>
  <td width=76 style='width:2.0cm;border:solid windowtext 1.0pt;border-top:
  none;padding:0cm 5.4pt 0cm 5.4pt;height:28.0pt'>
  <p class=MsoNormal align=center style='text-align:center'><i><span
  style='font-size:12.0pt'>1</span></i></p>
  </td>
  <td width=274 valign=top style='width:205.55pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:28.0pt'>
  <p class=MsoNormal><i><span style='font-size:12.0pt'>Изучение исходных данных
  для разработки курсовой работы</span></i></p>
  </td>
  <td width=95 style='width:70.9pt;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;
  height:28.0pt'>
  <p class=MsoNormal align=center style='text-align:center'><i><span
  lang=EN-US style='font-size:12.0pt'>15</span></i><i><span style='font-size:
  12.0pt'>.0</span></i><i><span lang=EN-US style='font-size:12.0pt'>2</span></i><i><span
  style='font-size:12.0pt'>.201</span></i><i><span lang=EN-US style='font-size:
  12.0pt'>9</span></i></p>
  </td>
  <td width=94 valign=top style='width:70.85pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:28.0pt'>
  <p class=MsoNormal style='text-align:justify'><i><span style='font-size:12.0pt'>&nbsp;</span></i></p>
  </td>
  <td width=85 valign=top style='width:63.8pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:28.0pt'>
  <p class=MsoNormal style='text-align:justify'><i><span style='font-size:12.0pt'>&nbsp;</span></i></p>
  <p class=MsoNormal style='text-align:justify'><i><span style='font-size:12.0pt'>&nbsp;</span></i></p>
  </td>
 </tr>
 <tr style='page-break-inside:avoid;height:28.0pt'>
  <td width=76 style='width:2.0cm;border:solid windowtext 1.0pt;border-top:
  none;padding:0cm 5.4pt 0cm 5.4pt;height:28.0pt'>
  <p class=MsoNormal align=center style='text-align:center'><i><span
  style='font-size:12.0pt'>2</span></i></p>
  </td>
  <td width=274 valign=top style='width:205.55pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:28.0pt'>
  <p class=MsoNormal><i><span style='font-size:12.0pt'>Разработка  базы данных
  системы в среде </span></i><i><span lang=EN-US style='font-size:12.0pt'>SQL</span></i><i><span
  style='font-size:12.0pt'>-сервера</span></i></p>
  </td>
  <td width=95 style='width:70.9pt;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;
  height:28.0pt'>
  <p class=MsoNormal align=center style='text-align:center'><i><span
  style='font-size:12.0pt'>2</span></i><i><span lang=EN-US style='font-size:
  12.0pt'>5</span></i><i><span style='font-size:12.0pt'>.0</span></i><i><span
  lang=EN-US style='font-size:12.0pt'>2</span></i><i><span style='font-size:
  12.0pt'>.201</span></i><i><span lang=EN-US style='font-size:12.0pt'>9</span></i></p>
  </td>
  <td width=94 valign=top style='width:70.85pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:28.0pt'>
  <p class=MsoNormal style='text-align:justify'><i><span style='font-size:12.0pt'>&nbsp;</span></i></p>
  </td>
  <td width=85 valign=top style='width:63.8pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:28.0pt'>
  <p class=MsoNormal style='text-align:justify'><i><span style='font-size:12.0pt'>&nbsp;</span></i></p>
  </td>
 </tr>
 <tr style='page-break-inside:avoid;height:28.0pt'>
  <td width=76 style='width:2.0cm;border:solid windowtext 1.0pt;border-top:
  none;padding:0cm 5.4pt 0cm 5.4pt;height:28.0pt'>
  <p class=MsoNormal align=center style='text-align:center'><i><span
  style='font-size:12.0pt'>3</span></i></p>
  </td>
  <td width=274 valign=top style='width:205.55pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:28.0pt'>
  <p class=MsoNormal><i><span style='font-size:12.0pt'>Разработка программных
  компонент серверной части системы</span></i></p>
  </td>
  <td width=95 style='width:70.9pt;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;
  height:28.0pt'>
  <p class=MsoNormal align=center style='text-align:center'><i><span
  lang=EN-US style='font-size:12.0pt'>2</span></i><i><span style='font-size:
  12.0pt'>5.</span></i><i><span lang=EN-US style='font-size:12.0pt'>03</span></i><i><span
  style='font-size:12.0pt'>.201</span></i><i><span lang=EN-US style='font-size:
  12.0pt'>9</span></i></p>
  </td>
  <td width=94 valign=top style='width:70.85pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:28.0pt'>
  <p class=MsoNormal style='text-align:justify'><i><span style='font-size:12.0pt'>&nbsp;</span></i></p>
  </td>
  <td width=85 valign=top style='width:63.8pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:28.0pt'>
  <p class=MsoNormal style='text-align:justify'><i><span style='font-size:12.0pt'>&nbsp;</span></i></p>
  <p class=MsoNormal style='text-align:justify'><i><span style='font-size:12.0pt'>&nbsp;</span></i></p>
  </td>
 </tr>
 <tr style='page-break-inside:avoid;height:28.0pt'>
  <td width=76 style='width:2.0cm;border:solid windowtext 1.0pt;border-top:
  none;padding:0cm 5.4pt 0cm 5.4pt;height:28.0pt'>
  <p class=MsoNormal align=center style='text-align:center'><i><span
  style='font-size:12.0pt'>4</span></i></p>
  </td>
  <td width=274 valign=top style='width:205.55pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:28.0pt'>
  <p class=MsoNormal><i><span style='font-size:12.0pt'>Реализация клиентской
  части системы</span></i></p>
  </td>
  <td width=95 style='width:70.9pt;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;
  height:28.0pt'>
  <p class=MsoNormal align=center style='text-align:center'><i><span
  lang=EN-US style='font-size:12.0pt'>25</span></i><i><span style='font-size:
  12.0pt'>.</span></i><i><span lang=EN-US style='font-size:12.0pt'>04</span></i><i><span
  style='font-size:12.0pt'>.201</span></i><i><span lang=EN-US style='font-size:
  12.0pt'>9</span></i></p>
  </td>
  <td width=94 valign=top style='width:70.85pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:28.0pt'>
  <p class=MsoNormal style='text-align:justify'><i><span style='font-size:12.0pt'>&nbsp;</span></i></p>
  </td>
  <td width=85 valign=top style='width:63.8pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:28.0pt'>
  <p class=MsoNormal style='text-align:justify'><i><span style='font-size:12.0pt'>&nbsp;</span></i></p>
  <p class=MsoNormal style='text-align:justify'><i><span style='font-size:12.0pt'>&nbsp;</span></i></p>
  </td>
 </tr>
 <tr style='page-break-inside:avoid;height:28.0pt'>
  <td width=76 style='width:2.0cm;border:solid windowtext 1.0pt;border-top:
  none;padding:0cm 5.4pt 0cm 5.4pt;height:28.0pt'>
  <p class=MsoNormal align=center style='text-align:center'><i><span
  style='font-size:12.0pt'>5</span></i></p>
  </td>
  <td width=274 valign=top style='width:205.55pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:28.0pt'>
  <p class=MsoNormal><i><span style='font-size:12.0pt'>Оформление текста
  курсовой работы</span></i></p>
  </td>
  <td width=95 style='width:70.9pt;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;
  height:28.0pt'>
  <p class=MsoNormal align=center style='text-align:center'><i><span
  style='font-size:12.0pt'>0</span></i><i><span lang=EN-US style='font-size:
  12.0pt'>5</span></i><i><span style='font-size:12.0pt'>.05.201</span></i><i><span
  lang=EN-US style='font-size:12.0pt'>9</span></i></p>
  </td>
  <td width=94 valign=top style='width:70.85pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:28.0pt'>
  <p class=MsoNormal style='text-align:justify'><i><span style='font-size:12.0pt'>&nbsp;</span></i></p>
  </td>
  <td width=85 valign=top style='width:63.8pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:28.0pt'>
  <p class=MsoNormal style='text-align:justify'><i><span style='font-size:12.0pt'>&nbsp;</span></i></p>
  <p class=MsoNormal style='text-align:justify'><i><span style='font-size:12.0pt'>&nbsp;</span></i></p>
  </td>
 </tr>
</table>

<p class=MsoNormal style='text-align:justify'><span style='font-size:11.0pt'>&nbsp;</span></p>

<p class=MsoNormal style='text-align:justify'><span style='font-size:11.0pt'>&nbsp;</span></p>

<p class=MsoNormal style='text-align:justify'><span style='font-size:11.0pt'>&nbsp;</span></p>

<p class=MsoNormal style='text-align:justify'><span style='font-size:11.0pt'>&nbsp;</span></p>

<p class=MsoNormal style='text-align:justify'><span style='font-size:11.0pt'>&nbsp;</span></p>

<p class=MsoNormal style='text-align:justify'><span style='font-size:11.0pt'>&nbsp;</span></p>

<p class=MsoNormal style='text-align:justify'><span style='font-size:11.0pt'>&nbsp;</span></p>

<p class=MsoNormal style='text-align:justify'><span style='font-size:11.0pt'>&nbsp;</span></p>

<p class=MsoNormal style='text-align:justify'><span lang=EN-US
style='font-size:11.0pt'>&nbsp;</span></p>

<p class=MsoNormal style='text-align:justify'><span lang=EN-US
style='font-size:11.0pt'>&nbsp;</span></p>

<p class=MsoNormal><span style='font-size:14.0pt'>6  Дата выдачи задания      «<i><u>
01 </u></i>»<i><u>   февраля   </u></i> 201<i><u> 9 </u></i>г.</span></p>

<p class=MsoNormal style='text-align:justify'><span style='font-size:14.0pt'>&nbsp;</span></p>

<p class=MsoNormal style='text-align:justify'><span style='font-size:14.0pt'>&nbsp;</span></p>

<p class=MsoBodyText3 align=left style='text-align:left'><span
style='font-size:14.0pt'>Научный руководитель  <span style='color:black'>______________  
   <i><u>          <?php foreach ($rowsForTeacher as $row): ?>
                        <?= $row ?>
                    <?php endforeach; ?> </u></i></span><i><u>         </u></i></span></p>

<p class=MsoNormal><i>&nbsp;</i></p>

<p class=MsoNormal><i>&nbsp;</i></p>

<p class=MsoNormal style='text-align:justify'><span style='font-size:14.0pt'>Задание
принял к исполнению _______________     <i><u>        <span style='color:black'><?php foreach ($rowsForStudent as $row): ?>
                        <?= $row ?>
                    <?php endforeach; ?> </span>        </u></i></span></p>

</div>
</div>
</body>
<button onclick="Export2Doc('exportContent');">Скачать в word</button>
</html>
