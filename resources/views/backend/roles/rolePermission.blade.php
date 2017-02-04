<input type="hidden" name="id" id="role_id">
<div class="container" style="width: 100%">
    <div class="checkbox">
        @foreach($permissions as $permission)
        <label>
            <input type="checkbox" class="permissions" name="permission_id[]" value="{{ $permission->id }}">
            <span class="text">{{ $permission->display_name }}</span>
        </label>
        @endforeach
    </div>
    {{--<table class="table table-hover table-bordered" cellspacing="1" style="width: 100%">--}}
        {{--<tr>--}}
            {{--<td class="col-md-3">--}}
                {{--<div class="checkbox r1">--}}
                    {{--<label>--}}
                        {{--<input type="checkbox" class="flat-red" name="" value="" id="">--}}
                        {{--<span class="text">测试一</span>--}}
                    {{--</label>--}}
                {{--</div>--}}
            {{--</td>--}}
            {{--<td class="col-md-9">--}}
                {{--<div style="background: #ccc;">--}}
                    {{--<div class="checkbox">--}}
                        {{--<label>--}}
                            {{--<input type="checkbox" class="flat-red" name="" value="" id="">--}}
                            {{--<span class="text">测试二</span>--}}
                        {{--</label>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div>--}}
                    {{--<div class="checkbox">--}}
                        {{--<label>--}}
                            {{--<input type="checkbox" class="flat-red" name="" value="" id="">--}}
                            {{--<span class="text">测试三</span>--}}
                        {{--</label>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</td>--}}
        {{--</tr>--}}
        {{--<tr>--}}
            {{--<td class="col-md-3">--}}
                {{--<div class="checkbox r1">--}}
                    {{--<label>--}}
                        {{--<input type="checkbox" class="flat-red" name="" value="" id="">--}}
                        {{--<span class="text">测试一</span>--}}
                    {{--</label>--}}
                {{--</div>--}}
            {{--</td>--}}
            {{--<td class="col-md-9">--}}
                {{--<div style="background: #ccc;">--}}
                    {{--<div class="checkbox">--}}
                        {{--<label>--}}
                            {{--<input type="checkbox" class="flat-red" name="" value="" id="">--}}
                            {{--<span class="text">测试二</span>--}}
                        {{--</label>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div>--}}
                    {{--<div class="checkbox">--}}
                        {{--<label>--}}
                            {{--<input type="checkbox" class="flat-red" name="" value="" id="">--}}
                            {{--<span class="text">测试三</span>--}}
                        {{--</label>--}}
                        {{--<label>--}}
                            {{--<input type="checkbox" class="flat-red" name="" value="" id="">--}}
                            {{--<span class="text">测试三</span>--}}
                        {{--</label>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</td>--}}
        {{--</tr>--}}
    {{--</table>--}}
</div>