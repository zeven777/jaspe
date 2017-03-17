    <div class="input-group">

        <span class="input-group-addon">

            <input type="checkbox" data-parent="#{{
                $relation }}" name="{{
                $relation }}[]" value="{{
                $d->id }}"{{
                (isset($d->active) && $d->active) ? ' checked': ''
            }} />

        </span>

        <span class="form-control">{{
            ( is_array(p_schema($relation.".setup.head")) ) ?
                $d->{p_schema($relation.".setup.head.0")} :
                $d->{p_schema($relation.".setup.head")}
        }}</span>

    </div>