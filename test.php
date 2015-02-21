<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="jquery.sumoselect.min.js"></script>
    <link href="sumoselect.css" rel="stylesheet" />

    <script type="text/javascript">
        $(document).ready(function () {
            window.asd = $('.SlectBox').SumoSelect();
            
        });
    </script>
</head>
<body>

		
    <h1>Groups</h1>

    <select multiple="multiple" placeholder="Hello  im from placeholder" class="SlectBox">
      <option selected value="saab">Saab</option>
      <option value="opel">Opel</option>
      <option disabled="disabled" value="mercedez">Mercedez</option>
      <optgroup label="US Brands">
        <option value="chrysler">Chrysler</option>
        <option value="gm">General Motors</option>
        <option value="ford">Ford</option>
        <option disabled="disabled" value="plymouth">Plymouth</option>
      </optgroup>
      <optgroup label="French Brands">
        <option value="citroen">Citroën</option>
        <option value="peugeot">Peugeot</option>
        <option selected value="renault">Renault</option>
        <option value="nissan">Nissan</option>
      </optgroup>
      <optgroup label="Italian brands">
        <option value="fiat">Fiat</option>
        <option value="alpha-Romeo">Alpha Romeo</option>
        <option value="lamborghini">Lamborghini</option>
      </optgroup>
      <optgroup disabled="disabled" label="German brands">
        <option value="audi">Audi</option>
        <option value="bMW">BMW</option>
        <option value="volkswagen">Volkswagen</option>
      </optgroup>
      <option value="aston-martin">Aston Martin</option>
      <option value="hyundai">Hyundai</option>
      <option value="mitsubishi">Mitsubishi</option>
    </select>
	
	
	 <select placeholder="Hello  im from placeholder" class="SlectBox">
      <option selected value="saab">Saab</option>
      <option value="opel">Opel</option>
      <option disabled="disabled" value="mercedez">Mercedez</option>
      <optgroup label="US Brands">
        <option value="chrysler">Chrysler</option>
        <option value="gm">General Motors</option>
        <option value="ford">Ford</option>
        <option disabled="disabled" value="plymouth">Plymouth</option>
      </optgroup>
      <optgroup label="French Brands">
        <option value="citroen">Citroën</option>
        <option value="peugeot">Peugeot</option>
        <option selected value="renault">Renault</option>
        <option value="nissan">Nissan</option>
      </optgroup>
      <optgroup label="Italian brands">
        <option value="fiat">Fiat</option>
        <option value="alpha-Romeo">Alpha Romeo</option>
        <option value="lamborghini">Lamborghini</option>
      </optgroup>
      <optgroup disabled="disabled" label="German brands">
        <option value="audi">Audi</option>
        <option value="bMW">BMW</option>
        <option value="volkswagen">Volkswagen</option>
      </optgroup>
      <option value="aston-martin">Aston Martin</option>
      <option value="hyundai">Hyundai</option>
      <option value="mitsubishi">Mitsubishi</option>
    </select>
	
	
	 <select  placeholder="Hello  im from placeholder" >
      <option selected value="saab">Saab</option>
      <option value="opel">Opel</option>
      <option disabled="disabled" value="mercedez">Mercedez</option>
      <optgroup label="US Brands">
        <option value="chrysler">Chrysler</option>
        <option value="gm">General Motors</option>
        <option value="ford">Ford</option>
        <option disabled="disabled" value="plymouth">Plymouth</option>
      </optgroup>
      <optgroup label="French Brands">
        <option value="citroen">Citroën</option>
        <option value="peugeot">Peugeot</option>
        <option selected value="renault">Renault</option>
        <option value="nissan">Nissan</option>
      </optgroup>
      <optgroup label="Italian brands">
        <option value="fiat">Fiat</option>
        <option value="alpha-Romeo">Alpha Romeo</option>
        <option value="lamborghini">Lamborghini</option>
      </optgroup>
      <optgroup disabled="disabled" label="German brands">
        <option value="audi">Audi</option>
        <option value="bMW">BMW</option>
        <option value="volkswagen">Volkswagen</option>
      </optgroup>
      <option value="aston-martin">Aston Martin</option>
      <option value="hyundai">Hyundai</option>
      <option value="mitsubishi">Mitsubishi</option>
    </select>

    <br />
    <br />
    <br />  <br />
    <br />
    <br />  <br />
    <br />
    <br />  <br />
    <br />
    <br />  <br />
    <br />
    <br />  <br />
    <br />
    <br />  <br />
    <br />
    <br />  <br />
    <br />
          <select multiple="multiple" name="somename10" class="testselect10">
        <option value="volvo">Volvo</option>
       <option value="saab">Saab</option>
       <option disabled="disabled" value="mercedes">Mercedes</option>
       <option value="audi">Audi</option>
       <option value="bmw">BMW</option>
       <option disabled="disabled" value="porsche">Porche</option>
       <option selected="selected" value="ferrari">Ferrari</option>
       <option selected="selected" value="hyundai">Hyundai</option>
       <option value="mitsubishi">Mitsubishi</option>
    </select>
    
 <table class="auto-style5">
                <tr>
                    <td class="auto-style6">
                        <ul><li>
                        <input id="Button1" type="button" value="Attach SumoSelect" onclick="$('.testselect10').SumoSelect();" />
                            </li>
                            <li>
                                <input id="Button2" type="button" value="Detach SumoSelect" onclick="$('.testselect10')[0].sumo.unload();" />
                            </li>
                            <li>
                                <input id="Button3" type="button" value="Add item at index 1" onclick="$('.testselect10')[0].sumo.add('New Item',1);" />
                            </li>
                             <li>
                                <input id="Button4" type="button" value="Remove item at index 1" onclick="$('.testselect10')[0].sumo.remove(1);" />
                            </li>
                             <li>
                                <input id="Button5" type="button" value="Select item at index 1" onclick="$('.testselect10')[0].sumo.selectItem(1);" />
                            </li>
                            <li>
                                <input id="Button6" type="button" value="UnSelect item at index 1" onclick="$('.testselect10')[0].sumo.unSelectItem(1);" />
                            </li>
                             <li>
                                <input id="Button7" type="button" value="Disable item at index 1" onclick="$('.testselect10')[0].sumo.disableItem(1);" />
                            </li>
                             <li>
                                <input id="Button8" type="button" value="Enable item at index 1" onclick="$('.testselect10')[0].sumo.enableItem(1);" />
                            </li>
                             <li>
                                <input id="Button9" type="button" value="Toggle Enable disable" onclick="$('.testselect10')[0].sumo.disabled = !$('.testselect10')[0].sumo.disabled" />
                            </li>
                        </ul>
                    </td>
                    <td>

</td>
                </tr>
            </table>
 
</body>
</html>
