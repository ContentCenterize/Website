<div>

    <h2 class="prose-2xl font-bold">
        @if($thirdParty->verified)
            【<span class="text-green-700 font-bold">✅ 已驗證</span>】
        @else
            【<span class="text-red-500 font-bold">❌ 未驗證</span>】
        @endif
        {{$thirdParty->description}} ({{$thirdParty->base_url}})
    </h2>
    <div>
        驗證時間：{{$validation->validated_at ?? '尚未驗證'}}
    </div>

    <form class="form-control mt-2" wire:submit.prevent="save">
        <label for="type">
            <p>驗證類別：</p>
        </label>

        <select id="type" wire:model="validation.type" autocomplete="off">
            @foreach($validate_types as $type=>$data)
                <option
                    value="{{$type}}" {{$validation->type == $type ? 'selected' : ''}}>{{$data['description']}}</option>
            @endforeach
        </select>
        <p class="mt-5">驗證字串： </p>
        <pre>{{$validation->validate_string}}</pre>

        <button class="btn btn-secondary mt-5" type="submit" {{$thirdParty->verified ? 'disabled' : ''}}>儲存驗證方式</button>
    </form>


    <div id="tutorial" class="mt-5 card bg-blue-200 p-5">
        <p class="prose-2xl font-bold">驗證教學 🧑‍🏫</p>
        <div id="t_HTML" class="{{$validation->type == 'HTML' ? '': 'hidden'}}">
            <ul class="steps steps-vertical">
                <li class="step">
                    <button class="btn btn-primary mt-5" wire:click="downloadHTML" type="button">下載HTML驗證檔案</button>
                </li>
                <li class="step">上傳至網站根目錄</li>
                <li class="step">
                    檢查 {{ $thirdParty->base_url ."/hsuan-site-verification-". substr(md5($validation->validate_string), 0 , 10) . ".html"}}
                    是否存在
                </li>
                <li class="step"><button class="btn btn-success mt-5" wire:click="verify" type="button">驗證</button></li>
            </ul>
        </div>
        <div id="t_DNS" class="{{$validation->type == 'DNS' ? '': 'hidden'}}">
            <p>新增TXT記錄至你的網域DNS</p>
        </div>
    </div>
    <script>
        window.addEventListener('load', () => {
            let init = () => {
                for (x in {!!json_encode($validate_types)!!}) {
                    $(`#t_${x}`).hide()
                }
            };
            $('#type').change(() => {
                init()
                $(`#t_${$('#type').val()}`).show()
            })
        })
    </script>

</div>
