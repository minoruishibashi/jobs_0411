{"filter":false,"title":"errors.blade.php","tooltip":"/cms/resources/views/common/errors.blade.php","undoManager":{"mark":1,"position":1,"stack":[[{"start":{"row":0,"column":0},"end":{"row":14,"column":6},"action":"insert","lines":["","<!-- resources/views/common/errors.blade.php -->","@if (count($errors) > 0)","    <!-- Form Error List -->","    <div class=\"alert alert-danger\">","        <div><strong>入力した文字を修正してくた?さい。</strong></div> ","        <div>","            <ul>","            @foreach ($errors->all() as $error)","                <li>{{ $error }}</li>","            @endforeach","            </ul>","        </div>","    </div>","@endif"],"id":1}],[{"start":{"row":0,"column":0},"end":{"row":1,"column":0},"action":"remove","lines":["",""],"id":2}]]},"ace":{"folds":[],"scrolltop":0,"scrollleft":0,"selection":{"start":{"row":5,"column":13},"end":{"row":5,"column":13},"isBackwards":false},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":0},"timestamp":1628858977346,"hash":"630de3929f89fb5b572784d53b3b77130076c059"}