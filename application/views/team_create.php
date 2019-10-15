<div id="form">
    <div class="center"> Create your Team </div><hr>
    <center style="color:red">Note: Individual team members must be registered for the particular event before creating/joining a team.</center>
    <?php if (isset($message)) : ?>
        <div class="error">
            ERROR : <?= $message; ?>
        </div>
    <?php endif; ?>
    <?= validation_errors('<div class="error">', '</div>'); ?>
    <?= form_open('team'); ?>
        <div>
            <label for="captain">KTJ ID/Email of Captain</label><br>
            <input id="captain" type="text" name="captain" required>
        </div>
        <div>
            <label for="event">Event Name</label><br>
            <select id="event" name="event" class="dropdown1" required>
                <option value="">Choose an option</option>
                <?php foreach ($events as $event) : ?>
                    <option value="<?= $event->id; ?>"><?= $event->name; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div id="membersbox">
        </div>
        
        <div class="btn">
        <input type="submit" value="Register" name="submit">
        </div>
    </form>
    </div> 
<script>
    var event = [];
    <?php foreach ($events as $event): ?>
        event[<?= $event->id; ?>] = <?= $event->team_size;?>;
    <?php endforeach;?>
    document.addEventListener('DOMContentLoaded',function() {
        document.querySelector('select[name="event"]').onchange=changeEventHandler;
    },false);
    function changeEventHandler(ev) {
        var parentElement = document.getElementById('membersbox');
        while(parentElement.firstChild)
        {
            parentElement.removeChild(parentElement.firstChild);
        }
        if(!ev.target.value) alert('Please Select One');
        else
        {
            for(i = 1; i < event[ev.target.value]; i++)
            {
                var container = document.createElement('div');
                var br = document.createElement('br');
                var label = document.createElement('label');
                label.setAttribute('for', 'member'+i);
                var labeltext = document.createTextNode('KTJ ID/Email of  Member '+i);
                label.appendChild(labeltext);
                var inp = document.createElement('input');
                inp.setAttribute('type','text');
                inp.setAttribute('name','member'+i);
                inp.setAttribute('id','member'+i);
                var parentElement = document.getElementById('membersbox');
                parentElement.appendChild(container);
                container.appendChild(label);
                container.appendChild(br);
                container.appendChild(inp);
            }
        }; 
    }
    
</script>
  <canvas id="demo-canvas" style="display:none"></canvas>
</div>

