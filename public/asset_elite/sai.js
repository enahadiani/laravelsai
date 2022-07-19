// ------------------------------ GLOBAL FUNCTION ---------------------------------------

// Capitalize First Letter
function CFL(str){
    return str.charAt(0).toUpperCase() + str.slice(1);
}

// Convert Date
function reverseDate(date_str, separator){
    if(typeof separator === 'undefined'){separator = '-'}
    date_str = date_str.split(' ');
    var str = date_str[0].split(separator);

    return str[2]+separator+str[1]+separator+str[0];
}

//format Romawi
function toRoman(num) {  
    var result = '';
    var decimal = [1000, 500, 100, 50, 10, 5, 1];
    var roman = ["M", "D", "C", "L", "X", "V", "I"];
    for (var i = 0;i<=decimal.length;i++) {
    // looping over every element of our arrays
      while (num%decimal[i] < num) {   
      // keep trying the same number until we need to move to a smaller one     
        result += roman[i];
        // add the matching roman number to our result string
        num -= decimal[i];
        // subtract the decimal value of the roman number from our number
      }
    }
    return result;
}

// separasi angka
function DelDecimal(x){
    return Math.round(x);
}

function number_format(number,decimal=0,decimalmin=0){
    number = parseFloat(number).toFixed(decimal);
    return formatter = new Intl.NumberFormat(['ban','id'],{
        minimumFractionDigits: decimalmin, 
        maximumFractionDigits: decimal
    }).format(number);
}

function format_milyar(number, decimal=1,simbol = ' M'){
    number = number/1000000000;
    return number_format(number,decimal)+simbol;
}

function reverse_format(str_num){
    var parts = str_num.split(',');
    number = parts.join('');
    number = number.replace('Rp', '');
    return +number;
}

// function sepNumX(x){
//     if (typeof x === 'undefined' || !x) { 
//         return 0;
//     }else{
//         if(x < 0){
//             var x = parseFloat(x).toFixed(0);
//         }
        
//         var parts = x.toString().split(",");
//         parts[0] = parts[0].replace(/([0-9])(?=([0-9]{3})+$)/g,"$1.");
//         return parts.join(".");
//     }
// }

function sepNum(x){
    if(!isNaN(x)){
        if (typeof x === undefined || !x || x == 0) { 
            return 0;
        }else if(!isFinite(x)){
            return 0;
        }else{
            var x = parseFloat(x).toFixed(0);
            var parts = x.toString().split('.');
            parts[0] = parts[0].replace(/([0-9])(?=([0-9]{3})+$)/g,'$1.');
            return parts.join(',');
        }
    }else{
        return 0;
    }
}


function namaPeriode(periode){
    var bulan = periode.substr(4,2);
    var tahun = periode.substr(0,4);
    switch (bulan){
        case 1 : case '1' : case '01': bulan = "Januari"; break;
        case 2 : case '2' : case '02': bulan = "Februari"; break;
        case 3 : case '3' : case '03': bulan = "Maret"; break;
        case 4 : case '4' : case '04': bulan = "April"; break;
        case 5 : case '5' : case '05': bulan = "Mei"; break;
        case 6 : case '6' : case '06': bulan = "Juni"; break;
        case 7 : case '7' : case '07': bulan = "Juli"; break;
        case 8 : case '8' : case '08': bulan = "Agustus"; break;
        case 9 : case '9' : case '09': bulan = "September"; break;
        case 10 : case '10' : case '10': bulan = "Oktober"; break;
        case 11 : case '11' : case '11': bulan = "November"; break;
        case 12 : case '12' : case '12': bulan = "Desember"; break;
        case 13 : case '13' : case '13': bulan = "Desember 2"; break;
        case 14 : case '14' : case '14': bulan = "Desember 3"; break;
        case 15 : case '15' : case '15': bulan = "Desember 4"; break;
        case 16 : case '16' : case '16': bulan = "Desember 5"; break;
        default: bulan = null;
    }

    return bulan+' '+tahun;
}

function toCapitalize(str){
    const newstr = str.toLowerCase().replace(/\w\S*/g, (w) => (w.replace(/^\w/, (c) => c.toUpperCase())));
    return newstr;
}

function namaPeriodeBulan(periode){
    var bulan = periode.substr(4,2);
    switch (bulan){
        case 1 : case '1' : case '01': bulan = "Januari"; break;
        case 2 : case '2' : case '02': bulan = "Februari"; break;
        case 3 : case '3' : case '03': bulan = "Maret"; break;
        case 4 : case '4' : case '04': bulan = "April"; break;
        case 5 : case '5' : case '05': bulan = "Mei"; break;
        case 6 : case '6' : case '06': bulan = "Juni"; break;
        case 7 : case '7' : case '07': bulan = "Juli"; break;
        case 8 : case '8' : case '08': bulan = "Agustus"; break;
        case 9 : case '9' : case '09': bulan = "September"; break;
        case 10 : case '10' : case '10': bulan = "Oktober"; break;
        case 11 : case '11' : case '11': bulan = "November"; break;
        case 12 : case '12' : case '12': bulan = "Desember"; break;
        default: bulan = null;
    }

    return bulan;
}

function namaPeriode2(periode){
    var bulan = periode.substr(4,2);
    var tahun = periode.substr(0,4);
    switch (bulan){
        case 1 : case '1' : case '01': bulan = "Januari"; break;
        case 2 : case '2' : case '02': bulan = "Februari"; break;
        case 3 : case '3' : case '03': bulan = "Maret"; break;
        case 4 : case '4' : case '04': bulan = "April"; break;
        case 5 : case '5' : case '05': bulan = "Mei"; break;
        case 6 : case '6' : case '06': bulan = "Juni"; break;
        case 7 : case '7' : case '07': bulan = "Juli"; break;
        case 8 : case '8' : case '08': bulan = "Agustus"; break;
        case 9 : case '9' : case '09': bulan = "September"; break;
        case 10 : case '10' : case '10': bulan = "Oktober"; break;
        case 11 : case '11' : case '11': bulan = "November"; break;
        case 12 : case '12' : case '12': bulan = "Desember 1"; break;
        case 13 : case '13' : case '13': bulan = "Desember 2"; break;
        case 14 : case '14' : case '14': bulan = "Desember 3"; break;
        case 15 : case '15' : case '15': bulan = "Desember 4"; break;
        case 16 : case '16' : case '16': bulan = "Desember 5"; break;
        default: bulan = null;
    }

    return tahun+'-'+bulan;
}

function judul_lap(nama,lokasi,periode){
    return `<table class='table table-borderless' width='100%'>
        <tr>
            <td class='text-center px-0 py-0 judul-nama'>`+nama+`</td>
        </tr>
        <tr>
            <td class='text-center px-0 py-0 judul-lokasi'>`+lokasi+`</td>
        </tr>
        <tr>
            <td class='text-center px-0 py-0 judul-periode'>`+periode+`</td>
        </tr>
    </table>`;
}

function sepNum(x,prefix=null){
    if (typeof x === 'undefined' || !x) { 
        return 0;
    }else{
        // if(x < 0){
        //     var x = parseFloat(x).toFixed(0);
        // }
        
        // var parts = x.toString().split(",");
        // parts[0] = parts[0].replace(/([0-9])(?=([0-9]{3})+$)/g,"$1.");
        // return parts.join(".");
        var x=parseFloat(x).toFixed(0);
        var number_string = x.toString().replace(/[^,\d]/g, ''),
        split   		= number_string.split(','),
        sisa     		= split[0].length % 3,
        rupiah     		= split[0].substr(0, sisa),
        ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);
        
        // tambahkan titik jika yang di input sudah menjadi angka ribuan
        if(ribuan){
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }
        
        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? '' + rupiah : '');
    }
}

function toSatuan(num, satuan, pembagi, dec_places){
    // num diisi angka yang akan dikonversi
    // satuan diisi string seperti M, Jt, dll.
    // pembagi diisi angka pembagi, misalnya ke satuan milyar, diisi 1000000000
    // dec_places = jumlah decimal dibelakang koma
    return parseFloat(num/pembagi).toFixed(dec_places) + ' ' +satuan;
}

function singkatNilai(number) {
    var num = number;
    if (number < 0) {
        num = number * -1;
    }

    if (num >= 1000 && num < 1000000) {
        var str = "Rb";
        var pembagi = 1000;
    } else if (num >= 1000000 && num < 1000000000) {
        var str = "Jt";
        var pembagi = 1000000;
    } else if (num >= 1000000000 && num < 1000000000000) {
        var str = "M";
        var pembagi = 1000000000;
    } else if (num >= 1000000000000) {
        var str = "T";
        var pembagi = 1000000000000;
    }else{
        var pembagi = 1;
        var str = "";
    }

    if (number < 0) {
        return number_format(parseFloat((num*-1) / pembagi),1) + " " + str;
    } else if (num > 0 && num >= 1000) {
        return number_format(parseFloat(num / pembagi),1) + " " + str;
    } else if (num > 0 && num < 1000) {
        return number_format(num);
    } else {
        return number_format(num);
    }
}

function toRp(num){
    if(num < 0){
        return "(Rp"+sepNum(num * -1)+")";
    }else{
        return "Rp"+sepNum(num);
    }
}

function toRp2(num){
    if(num < 0){
        return "("+sepNum(num * -1)+")";
    }else{
        return sepNum(num);
    }
}

function toNilai(str_num){
    var parts = str_num.split('.');
    number = parts.join('');
    number = number.replace('Rp', '');
    number = number.replace(',', '.');
    return +number;
}

function removeFormat(str_num){
    var number = str_num.split('.');
    number = number.join('');
    number = number.replace(',', '.');
    return +number;
}


function LTrim ( value ) {
	if (typeof(value) != "string") return value;
	var re = /\s*((\S+\s*)*)/;
	return value.replace(re, "$1");
	
};
// Removes ending whitespaces
function RTrim ( value ) {	
	if (typeof(value) != "string") return value;
	var re = /((\s*\S+)*)\s*/;
	return value.replace(re, "$1");	
};

function trim ( value ) {	
	return LTrim(RTrim(value));	
};

// function terbilang(int){
//     angka = ["", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas"];
//     int = Math.floor(int);
//     if (int < 12)
//         return " " + angka[int];
//     else if (int < 20)
//         return terbilang(int - 10) + " belas";
//     else if (int < 100)
//         return terbilang(int / 10) + " puluh" + terbilang(int % 10);
//     else if (int < 200)
//         return " seratus" + terbilang(int - 100);
//     else if (int < 1000)
//         return terbilang(int / 100) + " ratus" + terbilang(int % 100);
//     else if (int < 2000)
//         return " seribu" + terbilang(int - 1000);
//     else if (int < 1000000)
//         return terbilang(int / 1000) + " ribu" + terbilang(int % 1000);
//     else if (int < 1000000000)
//         return terbilang(int / 1000000) + " juta" + terbilang(int % 1000000);
//     else if (int < 1000000000000)
//         return terbilang(int / 1000000) + " milyar" + terbilang(int % 1000000000);
//     else if (int >= 1000000000000)
//         return terbilang(int / 1000000) + " trilyun" + terbilang(int % 1000000000000);
// }

function terbilang(bilangan, curr="Rupiah") {
    bilangan = parseInt(bilangan).toString();
    var angka = ['0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0'];
    var kata = ['','Satu','Dua','Tiga','Empat','Lima','Enam','Tujuh','Delapan','Sembilan'];
    var tingkat = ['','Ribu','Juta','Milyar','Triliun'];
    var kalimat = "";  
    var panjang_bilangan = bilangan.length;
    /* pengujian panjang bilangan */
    if (panjang_bilangan > 15) {
      kalimat = "Diluar Batas";
      return kalimat;
    }

    /* mengambil angka-angka yang ada dalam bilangan,
       dimasukkan ke dalam array */
    for (var i = 1; i <= panjang_bilangan; i++) {
      angka[i] = bilangan.substr(-i,1);
    } 
    var i = 1;
    var j = 0;
    var subkalimat,kata1,kata2,kata3;
    kalimat = "";
    /* mulai proses iterasi terhadap array angka */
    while (i <= panjang_bilangan) {
      subkalimat = "";
      kata1 = "";
      kata2 = "";
      kata3 = "";
      /* untuk ratusan */
      if (angka[i+2] != "0") {
        if (angka[i+2] == "1") {
          kata1 = " Seratus";
        } else {
          kata1 = kata[angka[i+2]] + " Ratus";
        }
      }

      /* untuk puluhan atau belasan */
      if (angka[i+1] != "0") {
        if (angka[i+1] == "1") {
          if (angka[i] == "0") {
            kata2 = "Sepuluh";
          } else if (angka[i] == "1") {
            kata2 = "Sebelas";
          } else {
            kata2 = kata[angka[i]] + " Belas";
          }
        } else {
          kata2 = kata[angka[i+1]] + " Puluh";
        }
      }

      /* untuk satuan */
      if (angka[i] != "0") {
        if (angka[i+1] != "1") {
          kata3 = kata[angka[i]];
        }
      }

      /* pengujian angka apakah tidak nol semua,
         lalu ditambahkan tingkat */
      if ((angka[i] != "0") || (angka[i+1] != "0") || (angka[i+2] != "0")) {
         subkalimat = kata1 + " "+kata2 + " "+kata3 +"  "+tingkat[j];
      }
      /* gabungkan variabe sub kalimat (untuk satu blok 3 angka)
         ke variabel kalimat */
      kalimat = subkalimat + kalimat;
      i = i + 3;
      j = j + 1;

    }

    /* mengganti satu ribu jadi seribu jika diperlukan */
    if ((angka[5] == "0") && (angka[6] == "0")) {
         kalimat = kalimat.replace("Satu  Ribu","Seribu");
    }
    kalimat=kalimat + curr;
    return trim(kalimat);
};

function terb_depan(uang){
    var sub = '';
    if (uang == 1) { sub='Satu '} else
    if (uang == 2) { sub='Dua '} else
    if (uang == 3) { sub='Tiga '} else
    if (uang == 4) { sub='Empat '} else
    if (uang == 5) { sub='Lima '} else
    if (uang == 6) { sub='Enam '} else
    if (uang == 7) { sub='Tujuh '} else
    if (uang == 8) { sub='Delapan '} else
    if (uang == 9) { sub='Sembilan '} else
    if (uang == 0) { sub='  '} else
    if (uang == 10) { sub='Sepuluh '} else
    if (uang == 11) { sub='Sebelas '} else
    if ((uang >= 11) && (uang<=19)) { sub = terb_depan(uang % 10)+'Belas ';} else
    if ((uang >= 20) && (uang<=99)) { sub = terb_depan(Math.floor(uang / 10))+'Puluh '+terb_depan(uang % 10);} else
    if ((uang >= 100) && (uang<=199)) { sub = 'Seratus '+terb_depan(uang-100);} else
    if ((uang >= 200) && (uang<=999)) { sub = terb_depan(Math.floor(uang/100)) + 'Ratus '+terb_depan(uang % 100);} else
    if ((uang >= 1000) && (uang<=1999)) { sub = 'Seribu '+terb_depan(uang-1000);} else
    if ((uang >= 2000) && (uang<=999999)) { sub = terb_depan(Math.floor(uang/1000)) + 'Ribu '+terb_depan(uang % 1000);} else
    if ((uang >= 1000000) && (uang<=999999999)) { sub = terb_depan(Math.floor(uang/1000000))+'Juta '+terb_depan(uang%1000000);} else
    if ((uang >= 100000000) && (uang<=999999999999)) { sub = terb_depan(Math.floor(uang/1000000000))+'Milyar '+terb_depan(uang%1000000000);} else
    if ((uang >= 1000000000000)) { sub = terb_depan(Math.floor(uang/1000000000000))+'Triliun '+terb_depan(uang%1000000000000);}
    return sub;
}

function terb_belakang(t){
    if (t.length==0){
        return '';
    }
    return 'Koma '+t
        .split('0').join('Nol ')
        .split('1').join('Satu ')
        .split('2').join('Dua ')
        .split('3').join('Tiga ')
        .split('4').join('Empat ')
        .split('5').join('Lima ')
        .split('6').join('Enam ')
        .split('7').join('Tujuh ')
        .split('8').join('Delapan ')
        .split('9').join('Dembilan ');
}

function terbilangkoma(nangka){
    var v = 0,sisa = 0,tanda = '',tmp = '',sub = '',subkoma = '',p1 = '',p2 = '',pkoma = 0;
    if (nangka>999999999999999999){
        return '...';
    }
    v = nangka;	
    if (v<0){
        tanda = 'Minus ';
    }
    v = Math.abs(v);
    tmp = v.toString().split('.');
    p1 = tmp[0];
    p2 = '';
    if (tmp.length > 1) {		
        p2 = tmp[1];
    }
    v = parseFloat(p1);
    sub = terb_depan(v);
    /* sisa = parseFloat('0.'+p2);
    subkoma = terb_belakang(sisa); */
    subkoma = terb_belakang(p2);
    sub = tanda + sub.replace('  ',' ') +' '+ subkoma.replace('  ',' ');
    sub = sub.replace('  ', ' ');
    sub = sub.replace('   ',' ');
    return sub;
}

// https://stackoverflow.com/a/32589289
// capitalize first letter
function CFL(str) {
   var splitStr = str.toLowerCase().split(' ');
   for (var i = 0; i < splitStr.length; i++) {
       splitStr[i] = splitStr[i].charAt(0).toUpperCase() + splitStr[i].substring(1);     
   }
   return splitStr.join(' '); 
}

function generateFormat(format, str){
    switch (format){
        case 'sepNum': var formated_str = sepNum(str); break;
        case 'sepNum2': var formated_str = sepNum2(str); break;
        case 'sepNumKanan': var formated_str = "<p align='right'>"+sepNum(str)+"</p>"; break;
        case 'sepNum2Kanan': var formated_str = "<p align='right'>"+sepNum2(str)+"</p>"; break;
        case 'sepNum2Kanan%': var formated_str = "<p align='right'>"+sepNum2(str)+"%</p>"; break;
        case 'toRp': var formated_str = toRp(str); break;
        case 'toNilai': var formated_str = toNilai(str); break;
    }

    return formated_str;
}


function clearInput(){
    $("input:not([type='radio'],[type='checkbox'],[type='submit'])").val('');
    $('textarea').val('');
    $("select:not('.selectize')").val('');
    $('#validation-box').text('');
}

function incKode(str, sep){
    var parts = str.split(sep);
    var num = (+parts[parts.length - 1]) + 1;
    var zero = '';
    for(i = 0; i<parts[parts.length - 1].length; i++){
        zero += '0';
    }
    return parts[0]+"."+((zero + num).slice(-4));
    // return zero;
    // return num;
}

var displayRecords = [];

function generatePagination(id_pagination,recPerPage,data){
    if(recPerPage != "All"){

        var $pagination = $('#'+id_pagination),
            totalRecords = data.result.length,
            records = data.result,
            recPerPage = parseInt(recPerPage),
            page = 1,
            totalPages = Math.ceil(totalRecords / recPerPage);

        if($pagination.data("twbs-pagination")){
            $pagination.twbsPagination('destroy');
        }

        $pagination.twbsPagination({
            totalPages: totalPages,
            visiblePages: 3,
            onPageClick: function (event, page) {
                displayRecordsIndex = Math.max(page - 1, 0) * recPerPage;
                endRec = (displayRecordsIndex) + recPerPage;
                console.log(displayRecordsIndex + 's.d'+ endRec);
                displayRecords = records.slice(displayRecordsIndex, endRec);
                
                if(!isNaN(displayRecordsIndex)){
                    drawRptPage(displayRecords,data,displayRecordsIndex,endRec);
                }else{
                    drawRptPage(data.result,data);
                }

            }
        });

    }else{
        drawRptPage(data.result,data);
    }
}

function generatePaginationDore(id_pagination,recPerPage,data){
    if(recPerPage != "All"){

        var $pagination = $('#'+id_pagination),
            totalRecords = data.result.length,
            records = data.result,
            recPerPage = parseInt(recPerPage),
            page = 1,
            totalPages = Math.ceil(totalRecords / recPerPage);

        if($pagination.data("twbs-pagination")){
            $pagination.twbsPagination('destroy');
        }

        $pagination.twbsPagination({
            totalPages: totalPages,
            visiblePages: 3,
            prev: '<i class="simple-icon-arrow-left"></i>',
            next: '<i class="simple-icon-arrow-right"></i>',
            first: '',
            last: '',
            onPageClick: function (event, page) {
                displayRecordsIndex = Math.max(page - 1, 0) * recPerPage;
                endRec = (displayRecordsIndex) + recPerPage;
                console.log(displayRecordsIndex + 's.d'+ endRec);
                displayRecords = records.slice(displayRecordsIndex, endRec);
                
                if(!isNaN(displayRecordsIndex)){
                    drawRptPage(displayRecords,data,displayRecordsIndex,endRec);
                }else{
                    drawRptPage(data.result,data);
                }

            }
        });

    }else{
        drawRptPage(data.result,data);
    }
}



function ajaxPost(insert_url, cancel_url, formData, clear){
    if (typeof clear === 'undefined') { clear = true; }
    var domain = window.location.hostname;
    var post_url = "http://"+domain+insert_url;
    var status = true;
    $.ajax({
        url: post_url,
        data: formData,
        type: "post",
        dataType: "json",
        contentType: false,       // The content type used when sending data to the server.
        cache: false,             // To unable request pages to be cached
        processData:false, 
        success: function (data) {
            // console.log(data);
            alert(data.alert);

            if(data.status == 1){
                // clear input dan validation box jika berhasil
                if(clear){
                    clearInput();
                }

                if(data.edit){
                    if(cancel_url == null){
                        location.reload();
                    }else{
                        window.location = "http://"+domain+cancel_url;
                    }
                    // for(i = 0; i < $('.selectize').length; i++){
                    //     $('.selectize')[i].selectize.setValue('');
                    //     alert($('.selectize')[i].selectize.getValue());
                    //     if selectize.length == null ?
                    // }
                }
            }else if(data.status == 2){
                status = false;
            }else if (data.status == 3){
                // https://stackoverflow.com/a/26166303
                var error_array = Object.keys(data.error_input).map(function (key) { return data.error_input[key]; });

                // append input element error
                var error_list = "<div class='alert alert-danger' style='padding:0px; padding-top:5px; padding-bottom:5px; margin:0px; color: #a94442; background-color: #f2dede; border-color: #ebccd1;'><ul>";
                for(i = 0; i<error_array.length; i++){
                    error_list += '<li>'+error_array[i]+'</li>';
                }
                error_list += "</ul></div>";
                status = false;
                $('#validation-box').html(error_list);
            }
        }
    });

    return status;
}



function saiPost(post_url, cancel_url, formData, table_refresh_target_id, success_callback, failed_callback, clear){
    if (typeof clear === 'undefined') { clear = true; }
    if (typeof table_refresh_target_id === 'undefined') { table_refresh_target_id = null; }
    if (typeof success_callback === 'undefined') { success_callback = null; }
    if (typeof failed_callback === 'undefined') { failed_callback = null; }
    var status = true;
    $.ajax({
        url: post_url,
        data: formData,
        type: "post",
        dataType: "json",
        contentType: false,       // The content type used when sending data to the server.
        cache: false,             // To unable request pages to be cached
        processData:false, 
        async:false,
        success: function (data) {
            if(data.auth_status == 1){
                if(typeof data.alert !== 'undefined'){
                    alert("Auth success : "+data.alert);
                }
                
                if(success_callback != null){
                    success_callback(data);
                }else{
                    if(data.status == 1){
                        // clear input dan validation box jika berhasil
                        if(table_refresh_target_id != null){
                            $(table_refresh_target_id).DataTable().ajax.reload();
                        }
                        
                        if(clear){
                            // if(confirm('Bersihkan input?')){
                            clearInput();
                            // }
                        }
    
                        if(data.edit){
                            if(cancel_url == null){
                                location.reload();
                            }else{
                                window.location = cancel_url;
                            }
                            // for(i = 0; i < $('.selectize').length; i++){
                            //     $('.selectize')[i].selectize.setValue('');
                            //     alert($('.selectize')[i].selectize.getValue());
                            //     if selectize.length == null ?
                            // }
                        }else{
                            $('.nav-tabs a[href="#sai-container-daftar"]').tab('show');
                        }
                    }
                }

                if(failed_callback != null){
                    failed_callback(data);
                }else{
                    if (data.status == 3){
                        // https://stackoverflow.com/a/26166303
                        var error_array = Object.keys(data.error_input).map(function (key) { return data.error_input[key]; });
    
                        // append input element error
                        var error_list = "<div class='alert alert-danger' style='padding:0px; padding-top:5px; padding-bottom:5px; margin:0px; color: #a94442; background-color: #f2dede; border-color: #ebccd1;'><ul>";
                        for(i = 0; i<error_array.length; i++){
                            error_list += '<li>'+error_array[i]+'</li>';
                        }
                        error_list += "</ul></div>";
                        $('#validation-box').html(error_list);
                    }
                }
            }else{
                alert("Auth Failed : "+data.error);
            }
        }
    });
}

function saiPostLoad(post_url, cancel_url, formData, table_refresh_target_id, success_callback, failed_callback, clear){
    if (typeof clear === 'undefined') { clear = true; }
    if (typeof table_refresh_target_id === 'undefined') { table_refresh_target_id = null; }
    if (typeof success_callback === 'undefined') { success_callback = null; }
    if (typeof failed_callback === 'undefined') { failed_callback = null; }
    var status = true;
    $('#report-load').show();
    $('#report-load-bar').attr('aria-valuenow', 0).css({
        width: 0 + '%'
    }).html(parseFloat(0 * 100).toFixed(2) + '%');
    $.ajax({
        xhr: function () {
            var xhr = new window.XMLHttpRequest();
            console.log('xhr jalan');
            xhr.upload.addEventListener("progress", function (evt) {
                if (evt.lengthComputable) {
                    var percentComplete = evt.loaded / evt.total;
                    $('#report-load-bar').attr('aria-valuenow', percentComplete * 100).css({
                        width: percentComplete * 100 + '%'
                    }).html(parseFloat(percentComplete * 100).toFixed(2) + '%');
                    // if (percentComplete === 1) {
                    //     $('.progress').addClass('hidden');
                    // }
                }
            }, false);
            xhr.addEventListener("progress", function (evt) {
                if (evt.lengthComputable) {
                    var percentComplete = evt.loaded / evt.total;
                    $('#report-load-bar').css({
                        width: percentComplete * 100 + '%'
                    });
                }
            }, false);
            
            console.log('xhr udah');
            return xhr;
        },
        url: post_url,
        data: formData,
        type: "post",
        dataType: "json",
        contentType: false,       // The content type used when sending data to the server.
        cache: false,             // To unable request pages to be cached
        processData:false, 
        success: function (data) {
            if(data.auth_status == 1){
                if(typeof data.alert !== 'undefined'){
                    alert("Auth success : "+data.alert);
                }
                
                if(success_callback != null){
                    success_callback(data);
                }else{
                    if(data.status == 1){
                        // clear input dan validation box jika berhasil
                        if(table_refresh_target_id != null){
                            $(table_refresh_target_id).DataTable().ajax.reload();
                        }
                        
                        if(clear){
                            // if(confirm('Bersihkan input?')){
                            clearInput();
                            // }
                        }
    
                        if(data.edit){
                            if(cancel_url == null){
                                location.reload();
                            }else{
                                window.location = cancel_url;
                            }
                            // for(i = 0; i < $('.selectize').length; i++){
                            //     $('.selectize')[i].selectize.setValue('');
                            //     alert($('.selectize')[i].selectize.getValue());
                            //     if selectize.length == null ?
                            // }
                        }else{
                            $('.nav-tabs a[href="#sai-container-daftar"]').tab('show');
                        }
                    }
                }

                if(failed_callback != null){
                    failed_callback(data);
                }else{
                    if (data.status == 3){
                        // https://stackoverflow.com/a/26166303
                        var error_array = Object.keys(data.error_input).map(function (key) { return data.error_input[key]; });
    
                        // append input element error
                        var error_list = "<div class='alert alert-danger' style='padding:0px; padding-top:5px; padding-bottom:5px; margin:0px; color: #a94442; background-color: #f2dede; border-color: #ebccd1;'><ul>";
                        for(i = 0; i<error_array.length; i++){
                            error_list += '<li>'+error_array[i]+'</li>';
                        }
                        error_list += "</ul></div>";
                        $('#validation-box').html(error_list);
                    }
                }
            }else{
                alert("Auth Failed : "+data.error);
            }
        },
        complete:function(xhr){
            $('#report-load').hide();
            $('#report-load-bar').attr('aria-valuenow', 0).css({
                width: 0 + '%'
            }).html(parseFloat(0 * 100).toFixed(2) + '%');
        }
    });
}

function saiPostGrid(post_url, cancel_url, formData, table_refresh_target_id, success_callback, failed_callback, clear){
    if (typeof clear === 'undefined') { clear = true; }
    if (typeof table_refresh_target_id === 'undefined') { table_refresh_target_id = null; }
    if (typeof success_callback === 'undefined') { success_callback = null; }
    if (typeof failed_callback === 'undefined') { failed_callback = null; }
    var status = true;
    $('#grid-load').show();
    $.ajax({
        url: post_url,
        data: formData,
        type: "post",
        dataType: "json",
        contentType: false,       // The content type used when sending data to the server.
        cache: false,             // To unable request pages to be cached
        processData:false, 
        success: function (data) {
            if(data.auth_status == 1){
                if(typeof data.alert !== 'undefined'){
                    alert("Auth success : "+data.alert);
                }
                
                if(success_callback != null){
                    success_callback(data);
                }else{
                    if(data.status == 1){
                        // clear input dan validation box jika berhasil
                        if(table_refresh_target_id != null){
                            $(table_refresh_target_id).DataTable().ajax.reload();
                        }
                        
                        if(clear){
                            // if(confirm('Bersihkan input?')){
                            clearInput();
                            // }
                        }
    
                        if(data.edit){
                            if(cancel_url == null){
                                location.reload();
                            }else{
                                window.location = cancel_url;
                            }
                            // for(i = 0; i < $('.selectize').length; i++){
                            //     $('.selectize')[i].selectize.setValue('');
                            //     alert($('.selectize')[i].selectize.getValue());
                            //     if selectize.length == null ?
                            // }
                        }else{
                            $('.nav-tabs a[href="#sai-container-daftar"]').tab('show');
                        }
                    }
                }

                if(failed_callback != null){
                    failed_callback(data);
                }else{
                    if (data.status == 3){
                        // https://stackoverflow.com/a/26166303
                        var error_array = Object.keys(data.error_input).map(function (key) { return data.error_input[key]; });
    
                        // append input element error
                        var error_list = "<div class='alert alert-danger' style='padding:0px; padding-top:5px; padding-bottom:5px; margin:0px; color: #a94442; background-color: #f2dede; border-color: #ebccd1;'><ul>";
                        for(i = 0; i<error_array.length; i++){
                            error_list += '<li>'+error_array[i]+'</li>';
                        }
                        error_list += "</ul></div>";
                        $('#validation-box').html(error_list);
                    }
                }
            }else{
                alert("Auth Failed : "+data.error);
            }
        },
        complete:function(xhr){
            $('#grid-load').hide();
        }
    });
}

function saiReq(post_url, formData, options){
    if (typeof options === 'undefined') { 
        options = {
            'onSuccess' : function(par){}
        } 
    }
    
    var status = true;
    $.ajax({
        url: post_url,
        data: formData,
        type: "post",
        dataType: "json",
        contentType: false,       // The content type used when sending data to the server.
        cache: false,             // To unable request pages to be cached
        processData:false, 
        success: function (data) {
            options.onSuccess(data);
            if(data.auth_status == 1){
                alert("Auth success : "+data.alert);
                if(success_callback != null){
                    success_callback(data);
                }else{
                    if(data.status == 1){
                        // clear input dan validation box jika berhasil
                        if(table_refresh_target_id != null){
                            $(table_refresh_target_id).DataTable().ajax.reload();
                        }
                        
                        if(clear){
                            // if(confirm('Bersihkan input?')){
                            clearInput();
                            // }
                        }
    
                        if(data.edit){
                            if(cancel_url == null){
                                location.reload();
                            }else{
                                window.location = cancel_url;
                            }
                            // for(i = 0; i < $('.selectize').length; i++){
                            //     $('.selectize')[i].selectize.setValue('');
                            //     alert($('.selectize')[i].selectize.getValue());
                            //     if selectize.length == null ?
                            // }
                        }else{
                            $('.nav-tabs a[href="#sai-container-daftar"]').tab('show');
                        }
                    }
                }

                if(failed_callback != null){
                    failed_callback(data);
                }else{
                    if (data.status == 3){
                        // https://stackoverflow.com/a/26166303
                        var error_array = Object.keys(data.error_input).map(function (key) { return data.error_input[key]; });
    
                        // append input element error
                        var error_list = "<div class='alert alert-danger' style='padding:0px; padding-top:5px; padding-bottom:5px; margin:0px; color: #a94442; background-color: #f2dede; border-color: #ebccd1;'><ul>";
                        for(i = 0; i<error_array.length; i++){
                            error_list += '<li>'+error_array[i]+'</li>';
                        }
                        error_list += "</ul></div>";
                        $('#validation-box').html(error_list);
                    }
                }
            }else{
                alert("Auth Failed : "+data.error);
            }
        },
        error: function (err){
            console.log(err);
        }
    });
}

function drawChart(type, selector, series_array, categories, exporting, click_callback){
    if (typeof categories === 'undefined') { categories = null; }
    if (typeof exporting === 'undefined') { exporting = false; }
    if (typeof click_callback === 'undefined') { click_callback = null; }
    var options = {
        chart: {
            renderTo: selector,
            type: type
        },
        title:{
            text:''
        },
        exporting: { 
            enabled: exporting
        },
        series: [],
        xAxis: {
            title: {
                text: null
            },
            categories: []
        },
        yAxis:{
            title: {
                text: null
            },
            labels: {
                formatter: function () {
                    return singkatNilai(this.value);
                }
            }
        },
        credits: {
            enabled: false
        },
    };
    
    options.series = series_array;
    options.xAxis.categories = categories;

    if(click_callback !== null){
        options.plotOptions = click_callback;
    }

    new Highcharts.Chart(options);
}

function drawTable(parent_container, header_html, data_array, data_index_array, created_table_selector, col_format_obj){
    if (typeof created_table_selector === 'undefined') { created_table_selector = null; }
    if (typeof col_format_obj === 'undefined') { col_format_obj = null; }
    var table = "<table "+created_table_selector+">";
    var col = "";
    table += header_html;
    for(x=0; x<data_array.length; x++){
        col += "<tr>";

        for(i=0; i<data_index_array.length; i++){
            var str = data_array[x][data_index_array[i]];

            if(str != null){
                if(col_format_obj != null){
                    if(col_format_obj[data_index_array[i]] != undefined || col_format_obj[data_index_array[i]] != null){
                        col += "<td>"+generateFormat(col_format_obj[data_index_array[i]], str)+"</td>";
                    }else{
                        col += "<td>"+str+"</td>";
                    }
                }else{
                }
            }else{
                col += "<td> </td>";
            }

        }

        col += "</tr>";
    }
    table += col+"</table>";

    // console.log(table);
    $(parent_container).html(table);
}

function drawTableV(parent_container, header_html, row_name_array, data_array, data_index_array, created_table_selector, col_format_obj){
    if (typeof created_table_selector === 'undefined') { created_table_selector = null; }
    if (typeof col_format_obj === 'undefined') { col_format_obj = null; }
    var table = "<table "+created_table_selector+">";
    var col = "";
    table += header_html;
    // vertical loop
    for(x=0; x<row_name_array.length; x++){
        col += "<tr>";
        col += "<td>"+row_name_array[x]+"</td>";

        // horizontal loop
        // for(y=0; y<data_index_array.length; y++){
            col += "<td>"+data_array[data_index_array[x]]+"</td>";
        // }

        col += "</tr>";
    }
    table += col+"</table>";

    // console.log(table);
    $(parent_container).html(table);
}

function drawMenu(selector, array){
    $(selector).html('');
    var pre_prt = 0;
    var html_str = '<li class="header">Menu</li>';
    
    for(i=0; i<array.length; i++){
        form = array[i].view_html;
        this_lv = array[i].level_menu;
        this_link = form;

        if(i == 0){
            prev_lv = 0;
        }else{
            prev_lv = array[i-1].level_menu;
        }

        if(i == array.length-1){
            next_lv = array[i].level_menu;
        }else{
            next_lv = array[i+1].level_menu;
        }
 
        if(this_lv == 0 && next_lv == 0){
            html_str += "<li>"+
                            "<a href='pages/"+this_link+".html' class='menu-ui-ajax' data-toggle='push-menu'>"+
                                "<i class='fa fa-caret-right'></i> <span>"+array[i].nama+"</span>"+
                            "</a>"+
                        "</li>";
        }else if(this_lv == 0 && next_lv > 0){
            html_str += "<li class='treeview'>"+
                            "<a href='#'>"+
                                "<i class='fa fa-caret-right'></i> <span>"+array[i].nama+"</span>"+
                                "<span class='pull-right-container'>"+
                                    "<i class='fa fa-angle-left pull-right'></i>"+
                                "</span>"+
                            "</a>"+
                            "<ul class='treeview-menu'>";
        }else if((this_lv > prev_lv || this_lv == prev_lv || this_lv < prev_lv) && this_lv < next_lv){
            html_str += "<li class='treeview'>"+
                            "<a href='#'>"+
                                "<i class='fa fa-caret-right'></i> <span>"+array[i].nama+"</span>"+
                                "<span class='pull-right-container'>"+
                                    "<i class='fa fa-angle-left pull-right'></i>"+
                                "</span>"+
                            "</a>"+
                            "<ul class='treeview-menu'>";
        }else if((this_lv > prev_lv || this_lv == prev_lv || this_lv < prev_lv) && this_lv == next_lv){
            html_str += "<li>"+
                            "<a href='pages/"+this_link+".html' class='menu-ui-ajax' data-toggle='push-menu'>"+
                                "<i class='fa fa-caret-right'></i> <span>"+array[i].nama+"</span>"+
                            "</a>"+
                        "</li>";
        }else if(this_lv > prev_lv && this_lv > next_lv){
            html_str += "<li>"+
                            "<a href='pages/"+this_link+".html' class='menu-ui-ajax' data-toggle='push-menu'>"+
                                "<i class='fa fa-caret-right'></i> <span>"+array[i].nama+"</span>"+
                            "</a>"+
                        "</li>";
            for(i=0; i<(this_lv - next_lv); i++){
                html_str += "</ul></li>";
            }
        }else if((this_lv == prev_lv || this_lv < prev_lv) && this_lv > next_lv){
            html_str += "<li>"+
                            "<a href='pages/"+this_link+".html' class='menu-ui-ajax' data-toggle='push-menu'>"+
                                "<i class='fa fa-caret-right'></i> <span>"+array[i].nama+"</span>"+
                            "</a>"+
                        "</li>";
            html_str += "</ul></li>";
        }
    }

    $(selector).html(html_str);
}

function exportable(table_id, filename, file_type_array, custom_button_array){
    // table_id diisi string seperti : 'id_table_export' (tanpa #)
    // custom_button_array diisi associative array / object seperti : {'xlsx' : '#id-tombol-xlsx'}

    if (typeof filename === 'undefined') { filename = 'documents'; }
    if (typeof file_type_array === 'undefined') { file_type_array = ['xlsx']; }
    if (typeof custom_button_array === 'undefined'){
        // setting default button
        custom_button_array = {};
        var btn_html = '';
        for(i=0; i<file_type_array.length; i++){
            custom_button_array[file_type_array[i]] = '#sai-default-export-'+file_type_array[i];
            // var icon = (file_type_array[i] == 'xlsx') ? ('fa-file-excel-o') : (file_type_array[i] == 'csv') ? ('fa-newspaper-o') : (file_type_array[i] == 'txt') ? ('fa-file-text');
            var icon = (file_type_array[i] == 'xlsx') ? ('fa-file-excel-o') : ((file_type_array[i] == 'csv') ? ('fa-newspaper-o') : ('fa-file-text'));
            // var icon = 'fa-file-excel-o';

            btn_html += "<a href='#' class='btn btn-default pull-right' title='Export to "+(file_type_array[i].toUpperCase())+"' style='margin-left:5px;' id='sai-default-export-"+file_type_array[i]+"'><i class='fa "+icon+"'></i></a>";
        }

        // insert button ke header report
        $('#report-export').html(btn_html);
    }
    // console.log('#'+table_id);
    $('#'+table_id).tableExport({
        headers: true,
        footers: true,
        formats: file_type_array,
        filename: filename,
        bootstrap: true,
        exportButtons: false,
        position: 'top',
        ignoreRows: null,
        ignoreCols: null,
        trimWhitespace: true
    });

    var ExportButtons = document.getElementById(table_id);
    var instance = new TableExport(ExportButtons, {
        formats: file_type_array,
        exportButtons: false
    });

    for(i=0; i<file_type_array.length; i++){
        // Fixed options (temporary)
        if(file_type_array[i] == 'xlsx'){
            var exportXlsx = instance.getExportData()[table_id]['xlsx'];

            $('#ajax-content-section').on('click', custom_button_array['xlsx'], function(){
                instance.export2file(exportXlsx.data, exportXlsx.mimeType, filename, exportXlsx.fileExtension);
            });
        }else if(file_type_array[i] == 'csv'){
            var exportCsv = instance.getExportData()[table_id]['csv'];

            $('#ajax-content-section').on('click', custom_button_array['csv'], function(){
                instance.export2file(exportCsv.data, exportCsv.mimeType, filename, exportCsv.fileExtension);
            });
        }else if(file_type_array[i] == 'txt'){
            var exportTxt = instance.getExportData()[table_id]['txt'];

            $('#ajax-content-section').on('click', custom_button_array['txt'], function(){
                instance.export2file(exportTxt.data, exportTxt.mimeType, filename, exportTxt.fileExtension);
            });
        }
        
        // --------------------------------> ERROR (tombol automatis) <---------------------------------------
        // var exportData = instance.getExportData()[table_id][file_type_array[i]];

        // $('#ajax-content-section').on('click', custom_button_array[file_type_array[i]], function(){
        //     instance.export2file(exportData.data, exportData.mimeType, filename, exportData.fileExtension);
        // });
    }
}

function dropdownMultiRow(data_options, select_id, name, select_class, div_class, placeholder){
    var select_html = '';
    
    select_html += "<select id='"+select_id+"' name='"+name+"' class='"+select_class+"' placeholder='"+placeholder+"'></select>";

    $('#'+div_class).html(select_html);    

    var $select = $('#'+select_id).selectize({
        disableDelete: true,
		disableCaret: true,
		hidePlaceholder: true,
        valueField: 'id',
        labelField: 'name',
        searchField: ['name', 'additional_info'],
        sortField: [
            {field: 'name', direction: 'asc'}
        ],
        options: data_options,
        render: {
            item: function(item, escape) {
                var name = $.trim(item.name);
                return '<div>' +
                    (name ? '<span class="name" style="color:#1c1b1b;">' + escape(name) + '</span>' : '') +
                '</div>';
            },
            option: function(item, escape) {
                var name = $.trim(item.name);
                var label = name || item.additional_info;
                var caption = name ? item.additional_info : null;
                return '<div>' +
                    '<span class="label" style="color:#1c1b1b;font-size:15px;">' + escape(label) + '</span>' +
                    (caption ? '<span class="caption" style="font-size:14px;display:block;color:#3498db;">' + escape(caption) + '</span>' : '') +
                '</div>';
            }
        }
    });
}


// -------------------------------- REPORTING COMPONENT FUNCTION --------------------------------------

function resetRptPage(){
    var active_page = $('#sai-rpt-active-page-number').text();
    var number_of_page = $('#sai-rpt-number-of-page').text();

    for(i=number_of_page; i>1; i--){
        $('#sai-rpt-filter-box-result-page-' + i).hide();
    }

    $('#sai-rpt-active-page-number').text(0);
}

function drawRptPage(html, table_id){
    if(typeof table_id == 'undefined'){table_id = null}
    // console.log(table_id);

    var active_page = $('#sai-rpt-active-page-number').text();
    var number_of_page = $('#sai-rpt-number-of-page').text();

    // console.log('active : ' + active_page);
    if(+active_page == 0){
        // $('#sai-rpt-filter-box-result-page-2').hide();
        $('#sai-rpt-filter-box-result-page-1').html(html);
        $('#sai-rpt-filter-box-result-page-1').show();
        $('#sai-rpt-active-page-number').text(1);
        // console.log('target : 0');
    }else if((+active_page + 1) <= +number_of_page){
        $('#sai-rpt-filter-box-result-page-' + active_page).hide();
        $('#sai-rpt-filter-box-result-page-' + (+active_page + 1)).html(html);
        $('#sai-rpt-filter-box-result-page-' + (+active_page + 1)).show();
        $('#sai-rpt-active-page-number').text((+active_page + 1));
        // console.log('target : ' + (+active_page + 1));
    }else{
        // $('#sai-rpt-filter-box-result-page-2').hide();
        $('#sai-rpt-filter-box-result-page-1').html(html);
        $('#sai-rpt-filter-box-result-page-1').show();
        $('#sai-rpt-active-page-number').text(1);
        // console.log('target : 1');
    }
    
    if(table_id != null){
        exportable(table_id, 'documents', ['xlsx'], {'xlsx':'#sai-rpt-export-excel'});
        $('#sai-rpt-print').click(function(){
            $('#'+table_id).printThis();
        });
    }
}

// --------------------------------------- GLOBAL Handler ----------------------------------------
$(document).ready(function(){

    // $(".change-validation").change(function(){
    //     alert('testvalid');
        // location.reload(true);
    // });

    // menu expand / trace
    if(localStorage.active_menu !== null && window.location.href == localStorage.active_url){
        // console.log('#'+localStorage.active_menu);
        $('#'+localStorage.active_menu).closest('.treeview').addClass('menu-open');
        $('#'+localStorage.active_menu).css("display", "block");
        $('a[href="'+localStorage.active_url+'"]').closest('li').addClass('active');
    }else if(localStorage.active_menu === null && window.location.href == $('.sidebar-menu li:first-child>a').attr('href')){
        // console.log($('.sidebar-menu li:first-child>a').attr('href'));
        // console.log(window.location.href);
        // test con
        // first time login, dashboard dianggap menu pertama tanpa child
        $(".sidebar-menu li:first-child").addClass('active');
    }

    if($('.sai-adminlte-menu-container').length){
        $('.treeview-menu>li:not(.treeview)>a, .sidebar-menu>li:not(.treeview)>a').click(function(){
            // alert($(this).text());
            var parent_id = $(this).closest('.treeview-menu').attr('id');
            var url = $(this).attr('href');
            // alert(parent_id);

            // save parent id to localstorage
            localStorage.setItem('active_menu', parent_id);
            localStorage.setItem('active_url', url);
        });
    }
    
    $('body').on('click', ".tbl-delete", function(){
        var sts = confirm("Apakah anda yakin ingin menghapus item ini?");
        if(!sts){
            return false;
        }
    });

    $('.jenis_menu').change(function(){
        var jenis = $('.jenis_menu').val();
        if(jenis == "Fix"){
            $('.kode_form_area').show();
            $('.id_konten_area').hide();
            
            $(".kode_form").prop('disabled', false);
            $(".kode_form").prop('required', true);
            $(".id_konten").prop('disabled', true);
            $(".id_konten").prop('required', false);
        }else if(jenis == "Dinamis"){
            $('.id_konten_area').show();
            $('.kode_form_area').hide();
            
            $(".kode_form").prop('disabled', true);
            $(".kode_form").prop('required', false);
            $(".id_konten").prop('disabled', false);
            $(".id_konten").prop('required', true);
        }else{
            $('.kode_form_area').hide();
            $('.id_konten_area').hide();
            
            $(".kode_form").prop('disabled', true);
            $(".kode_form").prop('required', false);
            $(".id_konten").prop('disabled', true);
            $(".id_konten").prop('required', false);
        }
    });

    $('.open_new_window').click(function(){
        var href = $(this).attr('href');
        window.open(href, 'Print dokumen', "height=600,width=900");
        return false;
    });

    $('.open_new_tab').click(function(){
        var href = $(this).attr('href');
        window.open(href, '_blank');
        return false;
    });

    $('.download-link').click(function(){
        var link = document.createElement('a');
        link.href = $(this).attr('href'); 
        // link.download = 'image.jpeg';
        document.body.appendChild(link);
        link.click();   
    });
    
    $('.selectize').selectize({
        selectOnTab: true
    });

    $('.sai-rpt-filter-selectize').selectize({
        create: true
    })

    // $(':input[type="number"], .currency').on('keydown', function (e){
    //     var value = String.fromCharCode(e.which) || e.key;

    //     if (    !/[0-9\.]/.test(value) //angka dan titik
    //             && e.which != 190 // .
    //             && e.which != 116 // F5
    //             && e.which != 8   // backspace
    //             && e.which != 9   // tab
    //             && e.which != 13   // enter
    //             && e.which != 46  // delete
    //             && (e.which < 37 || e.which > 40) // arah 
    //             && (e.keyCode < 96 || e.keyCode > 105) // dan angka dari numpad
    //         ){
    //             e.preventDefault();
    //             return false;
    //     }
    // });

    $('.currency').inputmask("numeric", {
        radixPoint: ",",
        groupSeparator: ".",
        digits: 2,
        autoGroup: true,
        rightAlign: true,
        oncleared: function () { self.Value(''); }
    });

    // ------------------------------------ REPORTING COMPONENT HANDLER ----------------------------------
    
    $('#sai-rpt-prev-page').click(function(){
        var active_page = $('#sai-rpt-active-page-number').text();

        if(+active_page > 1){
            // show hide
            $('#sai-rpt-filter-box-result-page-'+ active_page).hide();
            $('#sai-rpt-filter-box-result-page-'+ (+active_page  - 1) ).show();
            $('#sai-rpt-active-page-number').text((+active_page - 1));
        }else{
            return false;
        }
    })

    // $('#sai-rpt-print').click(function(){
    //     $('#sai-rpt-table-export').printThis();
    // });
});