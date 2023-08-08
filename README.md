# Aplikasi-karyawan

*	git branch
*	git branch {'Nama Branch'} /** develop */
* 	git branch
*	git checkout {'Nama Branch'} /**  develop */
*	git push origin {'Nama Branch'} /** develop */


Note : Masukan Data Baru Yang di update atau file nya
*	git status
*	git add	-a
*	git commit -m "komentarnya"
*	git status
*	git log
*	git checkout master

Cara untuk marge
Note : Jika anda ingin marge  anda harus masuk ke checkout ke master/main {'branch utama'}
*	git checkout master
*	git merge {'Nama Branch'}  /** Contoh  branch : develop   */

Cara untuk Menghapus branch  yang ingin di hapus { Delete }
Note : Jika anda ingin menghapus branch , pertama-tama masuk ke checkout ke branch utama {'master/main'}
*	git checkout {'main/master'} /** Contoh branch : main/master  */
*	git branch -D {'Nama Branch'} /** Contoh branch : develop */

Note : Anda juga bisa menghapus 1 atau 2 branch bahkan semua branch yang ada kecuali branch main/master
*	git checkout {'main/master'} /** Contoh branch : main/master */
*	git branch -D {'develop'} {'develop2'} /** Contoh branch : develop develop2 */

Note : Setela itu check branch 
*	git branch
