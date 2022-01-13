<html>

<head>
    <meta http-equiv=Content-Type content="text/html; charset=windows-1251">
    <meta name=Generator content="Microsoft Word 15 (filtered)">
    <title>Отзыв</title>
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
        {font-family:Wingdings;
            panose-1:5 0 0 0 0 0 0 0 0 0;}
        @font-face
        {font-family:"Cambria Math";
            panose-1:2 4 5 3 5 4 6 3 2 4;}
        @font-face
        {font-family:"Arial Unicode MS";
            panose-1:2 11 6 4 2 2 2 2 2 4;}
        @font-face
        {font-family:"\@Arial Unicode MS";
            panose-1:2 11 6 4 2 2 2 2 2 4;}
        /* Style Definitions */
        p.MsoNormal, li.MsoNormal, div.MsoNormal
        {margin:0cm;
            margin-bottom:.0001pt;
            font-size:12.0pt;
            font-family:"Times New Roman",serif;}
        h1
        {margin:0cm;
            margin-bottom:.0001pt;
            text-align:center;
            page-break-after:avoid;
            font-size:11.5pt;
            font-family:"Times New Roman",serif;}
        h2
        {margin:0cm;
            margin-bottom:.0001pt;
            text-align:center;
            page-break-after:avoid;
            font-size:11.5pt;
            font-family:"Times New Roman",serif;
            font-weight:normal;
            font-style:italic;
            text-decoration:underline;}
        h3
        {margin:0cm;
            margin-bottom:.0001pt;
            text-align:center;
            page-break-after:avoid;
            font-size:10.0pt;
            font-family:"Times New Roman",serif;}
        h4
        {margin-top:15.0pt;
            margin-right:-55.3pt;
            margin-bottom:0cm;
            margin-left:72.0pt;
            margin-bottom:.0001pt;
            text-indent:36.0pt;
            line-height:12.0pt;
            page-break-after:avoid;
            font-size:11.0pt;
            font-family:"Times New Roman",serif;}
        p.MsoBodyText2, li.MsoBodyText2, div.MsoBodyText2
        {margin:0cm;
            margin-bottom:.0001pt;
            text-align:justify;
            text-autospace:none;
            font-size:11.5pt;
            font-family:"Times New Roman",serif;}
        /* Page Definitions */
        @page WordSection1
        {size:595.3pt 841.9pt;
            margin:42.55pt 1.0cm 2.0cm 3.0cm;}
        div.WordSection1
        {page:WordSection1;}
        /* List Definitions */
        ol
        {margin-bottom:0cm;}
        ul
        {margin-bottom:0cm;}
        -->
    </style>

</head>
<div id="exportContent">
    <body lang=RU>

    <div class=WordSection1>

        <h1 style='line-height:95%'><span style='font-size:14.0pt;line-height:95%;
color:black'>Учреждение образования</span></h1>

        <h1 style='line-height:95%'><span style='font-size:14.0pt;line-height:95%;
color:black'> «Гомельский государственный университет</span></h1>

        <h1 style='line-height:95%'><span style='font-size:14.0pt;line-height:95%;
color:black'> имени Франциска Скорины»</span></h1>

        <p class=MsoNormal align=center style='text-align:center'><span
                    style='font-size:14.0pt;color:black'> </span></p>

        <p class=MsoNormal align=center style='text-align:center'><b><span
                        style='font-size:15.0pt;color:black'>Факультет <?= $model->teacher->department->faculty->faculty_name?></span></b></p>

        <p class=MsoNormal align=center style='text-align:center'><b><span
                        style='font-size:15.0pt;color:black'>&nbsp;</span></b></p>

        <p class=MsoNormal align=center style='text-align:center'><b><span
                        style='font-size:15.0pt;color:black'>Кафедра <?= $model->teacher->department->department_name?></span></b></p>

        <p class=MsoNormal align=center style='text-align:center'><b><span
                        style='font-size:14.0pt;color:black'>&nbsp;</span></b></p>

        <h1 style='line-height:95%'><span style='font-size:14.0pt;line-height:95%;
color:black'>О Т З Ы В - ДОПУСК</span></h1>

        <p class=MsoNormal align=center style='text-align:center;line-height:95%'><span
                    style='font-size:14.0pt;line-height:95%'>научного руководителя на дипломную работу
(проект) студента</span></p>

        <p class=MsoNormal style='margin-left:99.25pt;text-indent:-99.25pt'><span
                    style='font-size:14.0pt;color:black'>специальности   <i><u><?= $model->group->cipher  ?>
«<?= $model->group->full_name ?>»</u></i></span></p>



        <p class=MsoNormal style='line-height:95%'><b><i><span style='font-size:11.0pt;
line-height:95%;color:black'>                                                              </span></i></b></p>

        <p class=MsoNormal style='line-height:95%'><b><i><span style='font-size:11.0pt;
line-height:95%;color:black'>&nbsp;</span></i></b></p>

        <p class=MsoNormal align=center style='text-align:center'><i><u><span
                            style='font-size:14.0pt;color:black'><?=$model->student->FIO?></span></u></i></p>

        <p class=MsoNormal align=center style='text-align:center;line-height:95%'><b><i><span
                            style='font-size:11.0pt;line-height:95%;color:black'>&nbsp;</span></i></b></p>

        <p class=MsoNormal align=center style='text-align:center;line-height:95%'><b><i><span
                            style='font-size:11.0pt;line-height:95%;color:black'>&nbsp;</span></i></b></p>

        <p class=MsoNormal><span style='font-size:14.0pt;color:black'>на тему   </span><i><u><span
                            style='font-size:14.0pt'><?=$model->title?></span></u></i></p>

        <p class=MsoNormal align=center style='text-align:center'><span
                    style='font-size:14.0pt;color:black'>&nbsp;</span></p>

        <p class=MsoNormal style='text-align:justify;line-height:95%'><span
                    style='font-size:7.0pt;line-height:95%;color:black'>&nbsp;</span></p>

        <table class=MsoNormalTable border=1 cellspacing=0 cellpadding=0
               style='border-collapse:collapse;border:none'>
            <tr>
                <td width=499 colspan=2 valign=top style='width:374.4pt;border:none;
  border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt'>
                    <p class=MsoNormal style='text-align:justify;line-height:95%'><b><span
                                    style='font-size:10.0pt;line-height:95%;color:black'>&nbsp;</span></b></p>
                </td>
                <td width=144 valign=top style='width:108.0pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
                    <h3 style='line-height:95%'><span style='font-size:11.0pt;line-height:95%;
  color:black'>Оценка</span></h3>
                </td>
            </tr>
            <tr>
                <td width=499 colspan=2 valign=top style='width:374.4pt;border:none;
  border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt'>
                    <p class=MsoNormal style='text-align:justify;line-height:95%'><b><u><span
                                        style='color:black'>1 </span></u></b><b><u><span style='font-size:11.5pt;
  line-height:95%;color:black'>ОБЩАЯ ХАРАКТЕРИСТИКА ДИПЛОМНОЙ РАБОТЫ <span
                                            style='text-transform:uppercase'>(проекта)</span></span></u></b></p>
                </td>
                <td width=144 valign=top style='width:108.0pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
                    <h3 style='line-height:95%'><span style='font-size:11.0pt;line-height:95%;
  color:black'>от 1 до 10</span></h3>
                </td>
            </tr>
            <tr>
                <td width=499 colspan=2 valign=top style='width:374.4pt;border:none;
  border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt'>
                    <p class=MsoNormal style='margin-top:6.0pt;margin-right:0cm;margin-bottom:
  0cm;margin-left:36.0pt;margin-bottom:.0001pt;text-indent:-18.0pt;line-height:
  95%'><span style='font-family:Symbol;color:black'>-<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </span></span><span style='color:black'>актуальность темы </span></p>
                </td>
                <td width=144 valign=top style='width:108.0pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
                    <p class=MsoNormal style='margin-top:6.0pt;text-align:justify;line-height:
  95%'><span style='font-size:11.0pt;line-height:95%;color:black;letter-spacing:
  .3pt'>1 2 3 4 5 6 7 8 9 10</span></p>
                </td>
            </tr>
            <tr>
                <td width=499 colspan=2 valign=top style='width:374.4pt;border:none;
  border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt'>
                    <p class=MsoNormal style='margin-top:6.0pt;margin-right:0cm;margin-bottom:
  0cm;margin-left:36.0pt;margin-bottom:.0001pt;text-indent:-18.0pt;line-height:
  95%'><span style='font-family:Symbol;color:black'>-<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </span></span><span style='color:black'>логичность и структурированность
  изложения материала </span></p>
                </td>
                <td width=144 valign=top style='width:108.0pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
                    <p class=MsoNormal style='margin-top:6.0pt;line-height:95%'><span
                                style='font-size:11.0pt;line-height:95%;color:black;letter-spacing:.3pt'>1 2
  3 4 5 6 7 8 9 10</span></p>
                </td>
            </tr>
            <tr>
                <td width=499 colspan=2 valign=top style='width:374.4pt;border:none;
  border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt'>
                    <p class=MsoNormal style='margin-top:6.0pt;margin-right:0cm;margin-bottom:
  0cm;margin-left:36.0pt;margin-bottom:.0001pt;text-indent:-18.0pt;line-height:
  95%'><span style='font-family:Symbol;color:black'>-<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </span></span><span style='color:black'>качество обзора и анализа литературы</span></p>
                </td>
                <td width=144 valign=top style='width:108.0pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
                    <p class=MsoNormal style='margin-top:6.0pt;line-height:95%'><span
                                style='font-size:11.0pt;line-height:95%;color:black;letter-spacing:.3pt'>1 2
  3 4 5 6 7 8 9 10</span></p>
                </td>
            </tr>
            <tr>
                <td width=499 colspan=2 valign=top style='width:374.4pt;border:none;
  border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt'>
                    <p class=MsoNormal style='margin-top:6.0pt;margin-right:0cm;margin-bottom:
  0cm;margin-left:36.0pt;margin-bottom:.0001pt;text-indent:-18.0pt;line-height:
  95%'><span style='font-family:Symbol;color:black'>-<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </span></span><span style='color:black'>корректность цитирований и ссылок на
  заимствования из работ других авторов</span></p>
                </td>
                <td width=144 valign=top style='width:108.0pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
                    <p class=MsoNormal style='margin-top:6.0pt;line-height:95%'><span
                                style='font-size:11.0pt;line-height:95%;color:black;letter-spacing:.3pt'>1 2
  3 4 5 6 7 8 9 10</span></p>
                </td>
            </tr>
            <tr>
                <td width=499 colspan=2 valign=top style='width:374.4pt;border:none;
  border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt'>
                    <p class=MsoNormal style='margin-top:6.0pt;margin-right:0cm;margin-bottom:
  0cm;margin-left:36.0pt;margin-bottom:.0001pt;text-indent:-18.0pt;line-height:
  95%'><span style='font-family:Symbol;color:black'>-<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </span></span><span style='color:black'>определение терминов и понятий,
  корректность их использования</span></p>
                </td>
                <td width=144 valign=top style='width:108.0pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
                    <p class=MsoNormal style='margin-top:6.0pt;line-height:95%'><span
                                style='font-size:11.0pt;line-height:95%;color:black;letter-spacing:.3pt'>1 2
  3 4 5 6 7 8 9 10</span></p>
                </td>
            </tr>
            <tr>
                <td width=499 colspan=2 valign=top style='width:374.4pt;border:none;
  border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt'>
                    <p class=MsoNormal style='margin-top:6.0pt;margin-right:0cm;margin-bottom:
  0cm;margin-left:36.0pt;margin-bottom:.0001pt;text-indent:-18.0pt;line-height:
  95%'><span style='font-family:Symbol;color:black'>-<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </span></span><span style='color:black'>корректность формулирования собственных
  выводов</span></p>
                </td>
                <td width=144 valign=top style='width:108.0pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
                    <p class=MsoNormal style='margin-top:6.0pt;line-height:95%'><span
                                style='font-size:11.0pt;line-height:95%;color:black;letter-spacing:.3pt'>1 2
  3 4 5 6 7 8 9 10 </span></p>
                </td>
            </tr>
            <tr>
                <td width=499 colspan=2 valign=top style='width:374.4pt;border:none;
  border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt'>
                    <p class=MsoNormal style='margin-top:6.0pt;margin-right:0cm;margin-bottom:
  0cm;margin-left:36.0pt;margin-bottom:.0001pt;text-indent:-18.0pt;line-height:
  95%'><span style='font-family:Symbol;color:black'>-<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </span></span><span style='color:black'>соответствие выводов и заключения
  целям и задачам дипломной работы</span></p>
                </td>
                <td width=144 valign=top style='width:108.0pt;border:none;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
                    <p class=MsoNormal style='margin-top:6.0pt;line-height:95%'><span
                                style='font-size:11.0pt;line-height:95%;color:black;letter-spacing:.3pt'>1 2
  3 4 5 6 7 8 9 10</span></p>
                </td>
            </tr>
            <tr>
                <td width=499 colspan=2 valign=top style='width:374.4pt;border:none;
  border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt'>
                    <p class=MsoNormal style='margin-top:6.0pt;margin-right:0cm;margin-bottom:
  0cm;margin-left:36.0pt;margin-bottom:.0001pt;text-indent:-18.0pt;line-height:
  95%'><span style='font-family:Symbol;color:black'>-<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </span></span><span style='color:black'>качество оформления дипломной работы
  (проекта)</span></p>
                </td>
                <td width=144 valign=top style='width:108.0pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
                    <p class=MsoNormal style='margin-top:6.0pt;line-height:95%'><span
                                style='font-size:11.0pt;line-height:95%;color:black;letter-spacing:.3pt'>1 2
  3 4 5 6 7 8 9 10</span></p>
                </td>
            </tr>
            <tr style='height:7.35pt'>
                <td style='border:none;padding:0cm 0cm 0cm 0cm' width=271><p class='MsoNormal'>&nbsp;</td>
                <td width=228 valign=top style='width:171.0pt;border:none;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:7.35pt'>
                    <h2 style='line-height:95%'><span style='font-size:12.0pt;line-height:95%;
  color:black'>    </span><b><span style='font-size:12.0pt;line-height:95%;
  color:black;font-style:normal'>Средняя по разделу</span></b></h2>
                </td>
                <td width=144 valign=top style='width:108.0pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:7.35pt'>
                    <p class=MsoNormal style='line-height:95%'><span style='font-size:10.0pt;
  line-height:95%;color:black'>&nbsp;</span></p>
                </td>
            </tr>
            <tr height=0>
                <td width=271 style='border:none'></td>
                <td width=228 style='border:none'></td>
                <td width=144 style='border:none'></td>
            </tr>
        </table>

        <p class=MsoNormal style='line-height:95%'><span style='font-size:10.0pt;
line-height:95%;color:black'>&nbsp;</span></p>

        <p class=MsoNormal style='line-height:95%'><span style='font-size:10.0pt;
line-height:95%;color:black'>&nbsp;</span></p>

        <table class=MsoNormalTable border=1 cellspacing=0 cellpadding=0
               style='border-collapse:collapse;border:none'>
            <tr>
                <td width=499 valign=top style='width:373.95pt;border:none;padding:0cm 5.4pt 0cm 5.4pt'>
                    <p class=MsoNormal style='text-align:justify;line-height:95%'><b><u><span
                                        style='color:black'>2   ХАРАКТЕР  ДЕЯТЕЛЬНОСТИ  СТУДЕНТА</span></u></b></p>
                </td>
                <td width=142 valign=top style='width:106.35pt;border:none;padding:0cm 5.4pt 0cm 5.4pt'>
                    <p class=MsoNormal style='text-align:justify;line-height:95%'><span
                                style='color:black'>&nbsp;</span></p>
                </td>
            </tr>
            <tr>
                <td width=499 valign=top style='width:373.95pt;border:none;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
                    <p class=MsoNormal style='margin-top:6.0pt;margin-right:0cm;margin-bottom:
  0cm;margin-left:36.0pt;margin-bottom:.0001pt;text-align:justify;text-indent:
  -18.0pt;line-height:95%'><span style='font-family:Symbol;color:black'>-<span
                                    style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </span></span><span style='color:black'>самостоятельность составления плана
  дипломной работы (проекта)</span></p>
                </td>
                <td width=142 valign=top style='width:106.35pt;border-top:solid windowtext 1.0pt;
  border-left:none;border-bottom:none;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
                    <p class=MsoNormal style='margin-top:6.0pt;line-height:95%'><span
                                style='font-size:11.0pt;line-height:95%;color:black;letter-spacing:.3pt'>1 2
  3 4 5 6 7 8 9 10</span></p>
                </td>
            </tr>
            <tr>
                <td width=499 valign=top style='width:373.95pt;border:none;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
                    <p class=MsoNormal style='margin-top:6.0pt;margin-right:0cm;margin-bottom:
  0cm;margin-left:36.0pt;margin-bottom:.0001pt;text-align:justify;text-indent:
  -18.0pt;line-height:95%'><span style='font-family:Symbol;color:black'>-<span
                                    style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </span></span><span style='color:black'>реализация советов научного
  руководителя</span></p>
                </td>
                <td width=142 valign=top style='width:106.35pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
                    <p class=MsoNormal style='margin-top:6.0pt;line-height:95%'><span
                                style='font-size:11.0pt;line-height:95%;color:black;letter-spacing:.3pt'>1 2
  3 4 5 6 7 8 9 10</span></p>
                </td>
            </tr>
            <tr>
                <td width=499 valign=top style='width:373.95pt;border:none;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
                    <p class=MsoNormal style='margin-top:6.0pt;margin-right:0cm;margin-bottom:
  0cm;margin-left:36.0pt;margin-bottom:.0001pt;text-indent:-18.0pt;line-height:
  95%'><span style='font-family:Symbol;color:black'>-<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </span></span><span style='color:black'>своевременность выполнения заданий
  каждого этапа работы</span></p>
                </td>
                <td width=142 valign=top style='width:106.35pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
                    <p class=MsoNormal style='margin-top:6.0pt;line-height:95%'><span
                                style='font-size:11.0pt;line-height:95%;color:black;letter-spacing:.3pt'>1 2
  3 4 5 6 7 8 9 10</span></p>
                </td>
            </tr>
            <tr>
                <td width=499 valign=top style='width:373.95pt;border:none;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
                    <p class=MsoNormal style='margin-top:6.0pt;margin-right:0cm;margin-bottom:
  0cm;margin-left:36.0pt;margin-bottom:.0001pt;text-indent:-18.0pt;line-height:
  95%'><span style='font-family:Symbol;color:black'>-<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </span></span><span style='color:black'>активность и инициатива студента в
  проведении исследования</span></p>
                </td>
                <td width=142 valign=top style='width:106.35pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
                    <p class=MsoNormal style='margin-top:6.0pt;line-height:95%'><span
                                style='font-size:11.0pt;line-height:95%;color:black;letter-spacing:.3pt'>1 2
  3 4 5 6 7 8 9 10</span></p>
                </td>
            </tr>
            <tr>
                <td width=499 valign=top style='width:373.95pt;border:none;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
                    <p class=MsoNormal style='margin-top:6.0pt'><span style='color:black'>                                                                      
  <b><u>Средняя по разделу</u></b></span></p>
                </td>
                <td width=142 valign=top style='width:106.35pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
                    <p class=MsoNormal style='margin-top:6.0pt;line-height:95%'><span
                                style='color:black;letter-spacing:.3pt'>&nbsp;</span></p>
                </td>
            </tr>
        </table>

        <p class=MsoNormal style='margin-top:6.0pt;line-height:95%'><b><u><span
                            style='color:black'><span style='text-decoration:none'>&nbsp;</span></span></u></b></p>

        <b><u><span style='font-size:12.0pt;line-height:95%;font-family:"Times New Roman",serif;
color:black'><br clear=all style='page-break-before:always'>
</span></u></b>

        <p class=MsoNormal style='margin-top:6.0pt;line-height:95%'><b><u><span
                            style='color:black'>3    ЗАМЕЧАНИЯ  И  ПРЕДЛОЖЕНИЯ </span></u></b></p>

        <p class=MsoBodyText2 style='margin-top:6.0pt;line-height:95%'><span
                    style='font-size:12.0pt;line-height:95%;color:black'>______________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________            </span></p>

        <p class=MsoBodyText2 style='margin-top:6.0pt;line-height:95%'><b><u><span
                            style='font-size:12.0pt;line-height:95%;color:black'>4   ЗАКЛЮЧЕНИЕ</span></u></b></p>

        <table class=MsoNormalTable border=0 cellspacing=0 cellpadding=0
               style='border-collapse:collapse'>
            <tr style='height:12.7pt'>
                <td width=523 valign=top style='width:392.4pt;border:none;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:12.7pt'>
                    <p class=MsoBodyText2 style='line-height:95%'><span style='font-size:12.0pt;
  line-height:95%;color:black'>1  Считаю, что дипломный проект соответствует
  требованиям, </span></p>
                    <p class=MsoBodyText2 style='margin-left:18.0pt;line-height:95%'><span
                                style='font-size:12.0pt;line-height:95%;color:black'>предъявляемым к дипломным
  проектам по специальности</span></p>
                    <p class=MsoNormal style='margin-left:78.0pt;text-indent:-63.8pt'><i><u><span
                                        style='font-size:14.0pt;color:black'><?= $model->group->cipher ?></span></u></i><i><u><span
                                        style='font-size:14.0pt;color:black'> </span></u></i><i><u><span
                                        style='font-size:14.0pt;color:black'>«<?= $model->group->full_name ?>»</span></u></i></p>
                    <p class=MsoNormal style='margin-left:78.0pt;text-indent:7.05pt'><i><u><span

                    <p class=MsoBodyText2 style='margin-left:18.0pt;line-height:95%'><span
                                style='font-size:11.0pt;line-height:95%;color:black'>&nbsp;</span></p>
                </td>
                <td width=84 valign=top style='width:63.0pt;border-top:solid windowtext 1.0pt;
  border-left:none;border-bottom:none;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:12.7pt'>
                    <p class=MsoNormal align=center style='text-align:center;line-height:95%'><span
                                style='color:black'>&nbsp;</span></p>
                    <p class=MsoNormal style='line-height:95%'><span style='color:black'>да      
  нет</span></p>
                </td>
            </tr>
            <tr style='height:15.6pt'>
                <td width=523 valign=top style='width:392.4pt;border:none;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt;height:15.6pt'>
                    <p class=MsoBodyText2 style='margin-top:6.0pt;line-height:95%'><span
                                style='font-size:12.0pt;line-height:95%;color:black'>2  Дипломный проект
  заслуживает оценки __________________________</span></p>
                </td>
                <td width=84 valign=top style='width:63.0pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt;height:15.6pt'>
                    <p class=MsoNormal style='line-height:95%'><span style='color:black'>&nbsp;</span></p>
                </td>
            </tr>
        </table>

        <p class=MsoNormal style='text-align:justify'><span style='color:black'>&nbsp;</span></p>

        <p class=MsoNormal style='text-align:justify'><span style='color:black'>&nbsp;</span></p>

        <p class=MsoNormal style='text-align:justify'><span style='color:black'>«___»
_______________ 2020  г.</span></p>

        <p class=MsoNormal><span style='color:black'>&nbsp;</span></p>

        <h4 style='margin-top:0cm;margin-right:-55.3pt;margin-bottom:0cm;margin-left:
0cm;margin-bottom:.0001pt;text-indent:0cm;line-height:12.0pt'><span
                    style='font-size:14.0pt;color:black;font-weight:normal'>&nbsp;</span></h4>

        <h4 style='margin-top:0cm;margin-right:-55.3pt;margin-bottom:0cm;margin-left:
0cm;margin-bottom:.0001pt;text-indent:0cm;line-height:12.0pt'><span
                    style='font-size:14.0pt;color:black;font-weight:normal'>Научный руководитель:                                                       </span><span
                    style='font-size:15.0pt;color:black;font-weight:normal'>         </span><span
                    style='font-size:14.0pt;color:black;font-weight:normal'>
        <?php foreach ($rows as $row): ?>
            <?= $row ?>
        <?php endforeach; ?></span><i><span
                        style='font-size:12.0pt;color:black;font-weight:normal'>              </span></i></h4>

        <p class=MsoNormal><span style='color:black'>&nbsp;</span></p>

    </div>
</div>
</body>

<button onclick="Export2Doc('exportContent');">Скачать в word</button>

</html>
