(function() {
  'use strict';   // 厳密なエラーチェックを行うモードにする宣言

  var cmds = document.getElementsByClassName('del');  // delクラスを取得
  var i;

  // cmdsの数だけループ
  for (i = 0; i < cmds.length; i++) {
    cmds[i].addEventListener('click', function(e) {
      e.preventDefault();  // リンク先に飛ぶというイベントを無効化

      if (confirm('are you sure?')) {   // 確認ダイアログの表示
        document.getElementById('form_' + this.dataset.id).submit();
        // $this.dataset.idでクリックされたdelクラスが持つdata-idを取得
        // 該当するidを持つリンクにsubmitさせる
      }
    });
  }


})();