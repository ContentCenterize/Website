<div class="p-10 card bg-base-200">
    <form class="form-control" wire:submit.prevent="add">
        <label class="label" for="base_url">
            <span class="label-text">基礎網址</span>
        </label>
        <input type="url" placeholder="base_url" class="input" id="base_url" wire:model="base_url">

        <label class="label" for="type">
            <span class="label-text">類別</span>
        </label>
        <select id="type" wire:model="type">
            @foreach($types as $type=>$data)
                <option value="{{$type}}" {{$data['default'] ? 'default' : ''}} >{{$data['name']}}</option>
            @endforeach
        </select>

        <label class="label" for="description">
            <span class="label-text">詳細</span>
        </label>
        <input type="text" placeholder="description" class="input" id="description" wire:model="description">


        <button class="btn btn-success mt-3" type="submit">新增</button>
    </form>
</div>

