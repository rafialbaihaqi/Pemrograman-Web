//contoh 9 membuat fungsi untuk menampilkan onclick ketika button klik disini 
//diklik maka akan muncul alert hore...berhasil
function inform(){
    alert("hore! fungsi kik berhasil")
}
var message = "welcome to my site"
//contoh 8 memformat di javascript
//menggunakan to.uppercase untuk memformat ke huruf kapital
//dan bold untuk memberi efek tebal pada huruf
document.write(message.toUpperCase().bold())

// contoh 10 fungsi javascript untuk mengecek email yang dimasukkan oleh user
// ketika mengandung  simbo @ maka akan masuk e statement apakah... benar?
//dan ketika salah masuk ke statement else
function checkemail(email){
    if (email.indexOf("@")!=-1 && email.indexOf(".")!=-1)
        alert("Apakah Alamat Email Sudah Benar?")
    else
        alert("Penulisan Email Salah")
}


//contoh 11 fungsi untuk membuka jendal baru berupa link merujuk pada website ittp
function bukajendela(){
    window.open("https://ittelkom-pwt.ac.id/", "ittp", "width=800, height=500,toolbar=1");
}


//contoh 12 alert, confim dan prompt  untuk memunculkan pertanyaan
//untuk mengkonfirmasi jawabannya yes or no
//progam ini mengkonfirmasi yakin tidak jik iya maka akan dibawa
//ke statement pergi ke task selanutnya sedangkan jika no maka
//masuk ke else untuk mengulangi sampe selesai
var x = window.confirm("Apakah kamu yakin?")
if(x)
    window.alert("pergi ke task selanjutnya")
else
    window.alert("ulangi sampe selsai")
//contoh 11.1 prompt untuk meminta inputan melalui window
// pada kode dibawah akan mengambil inputan dari nama user
var y = window.prompt("masukkan nama anda ")
window.alert(y)