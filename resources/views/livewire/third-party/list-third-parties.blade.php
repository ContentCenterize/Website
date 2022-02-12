<div class="overflow-x-auto">
    <div>
        @if (session()->has('message'))
            <div class="alert alert-success mb-3">
                {{ session('message') }}
            </div>
        @endif
    </div>
    @if(count($third_parties) != 0)
        <table class="table w-full">
            <thead>
            <tr>
                <th>基礎網址</th>
                <th>類別</th>
                <th>詳細資訊</th>
                <th>上次更新</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach($third_parties as $third_party)
                <tr>
                    <td>{{$third_party->base_url}}</td>
                    <td>{{Config::get("thirdparty.all.{$third_party->type}.name")}}</td>
                    <td>{{$third_party->description}}</td>
                    <td>{{\Carbon\Carbon::parse($third_party->updated)->shortRelativeToNowDiffForHumans()}}</td>
                    <td>
                        <a href="#confirm_deletion_{{$third_party->id}}" class="btn btn-error">刪除</a>
                        <button wire:click="sync({{$third_party->id}})" class="btn btn-primary">同步</button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <div class="alert alert-warning">
            <div class="flex-1">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     class="w-6 h-6 mx-2 stroke-current">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                </svg>
                <label>目前沒有任何第三方服務</label>
            </div>
        </div>
    @endif

    @foreach($third_parties as $third_party)
        <div id="confirm_deletion_{{$third_party->id}}" class="modal">
            <div class="modal-box">
                <div class="p-10 card bg-base-200">
                    <div class="form-control">
                        <p>你確定要刪除嗎？一旦刪除就無法恢復</p>
                        <input type="text" placeholder="輸入 {{$third_party->id}}" wire:model="confirmText" class="input mt-3">
                        <div class="modal-action">
                            <a href="#" class="btn btn-error" wire:click="delete({{$third_party->id}})" {{$confirmText == $third_party->id ? '' : 'disabled'}}>確定</a>
                            <a href="#" class="btn">Close</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>

