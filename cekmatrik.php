<form method="POST" action="cekmatrik1.php">
  <table>
 
            <tr>
              <td>Dosen1</td>
              <td>:</td>
              <td><input type=text name=dosen1></td>
            </tr> 
            <tr>
              <td>Dosen2</td>
              <td>:</td>
              <td><input type=text name=dosen2></td>
            </tr> 
            <tr>
              <td>Dosen3</td>
              <td>:</td>
              <td><input type=text name=dosen3></td>
            </tr> 
            
              <td>Tanggal</td>
              <td>:</td>
              <td><input type="date" name="tanggal" id="tanggal" class="form-control" onchange="ubahseleksi();"></td>
            </tr>                             
                  
            <tr>
              <td><input type="submit" class="btn btn-primary" name="Kirim" value="Simpan"> </td>
            </tr>
          </table>
  </table>
  </form>