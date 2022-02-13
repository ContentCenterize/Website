<div class="p-10 card bg-base-200">
    <form class="form-control" wire:submit.prevent="add">
        <label class="label" for="name">
            <span class="label-text">名稱</span>
        </label>
        <input type="text" placeholder="名稱" class="input" id="name" wire:model="name">

        <button class="btn btn-success mt-3" type="submit">新增</button>
    </form>
</div>

