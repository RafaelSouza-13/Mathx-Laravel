<div class="mb-3">
    <label for="number_one">{{ $slot }}</label>
    <input type="number" class="form-control" id={{ $id }} name={{ $name }} min={{ $min }} max={{ $max }}
        value={{ $value }}>
</div>