(function() {

    var champs = [
            "col",
            "type",
            "length"
        ],

        // fin de la config
        modifier = document.getElementById("modifier"),
        valider = document.getElementById("valider"),
        ajouter_ligne = document.getElementById("ajouter_ligne"),
        table = document.getElementById("database"),
        form = document.getElementById("createDatabaseForm");

    // désactiver les champs pour pas tout niquer
    function champs_disabled(disabled) {
        var i, c = table.tBodies[1].getElementsByTagName("input"),
            l = c.length;

        for (i = 0; i < l; i++) {
            c[i].disabled = disabled;
        }
    }

    ajouter_ligne.onclick = function() { // le petit bouton magique pour rajouter des lignes

        var i, supprimer,
            tbody = table.tBodies[0],
            ligne = tbody.insertRow(-1);

        function champ(name, value, type) { // juste parce que c'est chiant de retapper
            var span = document.createElement("span");
            span.className = "spanField";
            var t = document.createElement("input");

            t.type = type || "text";
            t.className = "form-control  w-75 datafield";
            t.name = t.id = name + "[]";
            t.value = value || "";
            t.required = true;

            span.appendChild(t)
            return span;
        }

        function select(i) {
            var span = document.createElement("span");
            span.className = "spanField";

            var s = document.createElement("select");
            s.className = "form-select  w-75 datafield";
            s.name = s.id = "type[]";
            var option = function(valueAtt, value) {
                var opt = document.createElement("option");
                opt.setAttribute("value", valueAtt);
                opt.innerText = value;
                return opt;
            }
            s.appendChild(option("int", "Int"));
            s.appendChild(option("text", "Text"));
            s.appendChild(option("bool", "Boolean"));
            span.appendChild(s);
            return span;
        }

        for (i = 0; i < champs.length; i++) {
            if (champs[i] === 'length') {
                (ligne.insertCell(i)).appendChild(champ(champs[i], "255", "number"));
            } else if (champs[i] === 'type') {
                (ligne.insertCell(i)).appendChild(select());
            } else {
                (ligne.insertCell(i)).appendChild(champ(champs[i]));
            }
        }


        supprimer = document.createElement("button");
        supprimer.type = "button";
        supprimer.className = "btn btn-danger btn-sm w-100";
        supprimer.innerHTML = "X";

        supprimer.onclick = function() {
            var tr = this.parentNode.parentNode;
            index = tr.sectionRowIndex;

            tbody.deleteRow(index);

            valider.disabled = false;
            modifier.disabled = true;
        };


        i = ligne.insertCell(champs.length);
        i.className = "actions";
        i.appendChild(supprimer);

        var n, nt, inputs, index;
        for (var n = 0, nt = tbody.rows.length; n < nt; n++) {
            inputs = tbody.rows[n].getElementsByClassName('datafield');

            index = tbody.rows[n].sectionRowIndex;

            for (var nn = 0, ntn = inputs.length; nn < ntn; nn++) {
                inputs.name = nn;
                inputs[nn].id = inputs[nn].name = inputs[nn].name.replace(/\[\d*\]$/, "[" + index + "]");

            }
        }

    };


})();