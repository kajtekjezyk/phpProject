function show_warning(response)
{
    let button = document.createElement("button");
    button.innerHTML = "pokaż stacje";
    button.addEventListener("click", function(){show_station_list();});
    button.classList.add("btn");
    button.classList.add("btn-warning");


    $("#main_content").addClass("warning");
    $("#main_content").html(response + "</br>");
    $("#accordion").html("");
    document.getElementById("main_content").appendChild(button);
}

function show_content(response)
{
    $("#main_content").removeClass("warning");
    $("#main_content").html(response);
    pokaz_modlitwy("Tajemnice");        


}

function prepare_station_report(stations)
{
    let output = "";
    output += `
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Nr</th>
                <th scope="col">Tajemnica</th>
                <th scope="col">Nazwa Stacji</th>
            </tr>
        </thead>
        <tbody>`;
    for (let i = 0; i<stations.length; ++i)
    {
        output += 
        `<tr>
            <td>` + (i+1) + `</td>
            <td>` + stations[i].tajemnica + `</td>
            <td>` + stations[i].nazwa + `</td>
        </tr>`;
        
    }
    output+= `
        </tbody>
    </table>`;
    return output;
}

function present_stations(result)
{
    result = result.replace(/[0-9]*[\/][0-9]*/g, '');
    let modal = document.getElementById("myModal");
    let span = document.getElementsByClassName("close")[0];
    let modal_content = document.getElementsByClassName("modal-body")[0];
    arrayOfObjects = JSON.parse(result).stations;
    console.log(arrayOfObjects);
    
    modal_content.innerHTML = prepare_station_report(arrayOfObjects);
    modal.style.display = "block"
    span.addEventListener("click", function(){modal.style.display = "none";});
    window.addEventListener("click", function(event)
    {
        if (event.target == this.document.getElementById("myModal")) {
            modal.style.display = "none";
          }
    });
}

function show_station_list()
{
    $.ajax({
        type: "POST",
        url: "ajax/station_list.php",
        dataType: "html",
        success: function(response){
            present_stations(response);
        }
    })
}

function clean_if_needed(okres)
{
    if(okres != "Tajemnice")
    {
        $("#main_content").html("");
    }
}

function pokaz_modlitwy(okres)
{
    clean_if_needed(okres);
    if ($.trim(okres) != '')
    {
        $.ajax({
            type: "POST",
            url: "ajax/wczytaj_modlitwy.php",
            dataType: "html",
            data: {"okres": okres},
            success: function(response){
                $("#accordion").html(response);
            }
        })
    }
}

function station(num, tajemnica)
{
    counter = 0;
    print_progress(10);
    if ($.trim(tajemnica) != '')
    {
        $.ajax({
            type: "POST",
            url: "ajax/get_content.php",
            dataType: "html",
            data: {"numer": num, "tajemnica": tajemnica},
            success: function(response){
                show_content(response);
            }
        })
    }
}

function szukaj_stacji()
{
    $("#sub").prop("disabled", true);
    var stacja = document.getElementById("stacja").value;
    if (stacja.length == 0)
    {
        show_warning("Nie wpisano stacji");
    }
    else
    {
        $.ajax({
            type: "POST",
            url: "ajax/search.php",
            dataType: "html",
            data: {"stacja": stacja},
            success: function(response){
                if (response.includes("Błąd")) show_warning(response);
                else show_content(response);
            }
        })
    }
    $("#sub").prop("disabled", false);
}