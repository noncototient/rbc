<label class="label">Provide Item Details</label>
<div class="control is-grouped">
	<p class="control is-expanded">
		<input class="input is-medium" name="name" type="text" placeholder="Item name" value="{{$item->name ?? ''}}">
	</p>
	<p class="control">
		<input class="input is-medium" name="price" type="number" placeholder="Price" value="{{$item->price ?? ''}}">
	</p>
</div>
<p class="control">
	<textarea class="textarea is-medium" name="description" placeholder="Item Description">{{$item->description ?? ''}}</textarea>
</p>
<p class="control">
	<button class="button is-primary is-medium">
		Add Item
		<span class="icon">
			<i class="fa fa-check"></i>
		</span>
	</button>
	<a href="/menu" class="button is-link is-medium">
		Back to Menu
		<span class="icon">
			<i class="fa fa-arrow-left"></i>
		</span>
	</a>
</p>