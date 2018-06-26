class Calculator 
{
    constructor(settings) 
    {
        this.baseprice = settings.baseprice;
        this.custprice = settings.custprice;
        this.custminHR = settings.custminHR;
        this.custmaxHR = settings.custmaxHR;
        this.priceMin = settings.priceMin;
        this.priceMax = settings.priceMax;
        this.taxMin = settings.taxMin;
        this.taxMax = settings.taxMax;

    }
    validate()
    {
        var pricerange = (document.getElementById("carprice").value >= this.priceMin && document.getElementById("carprice").value <= this.priceMax);
        var taxrange = (document.getElementById("tax").value >= this.taxMin && document.getElementById("tax").value <= this.taxMax);
        var instalments = (document.getElementById("instalments").value >= 1 && document.getElementById("instalments").value <= 12);
       

        if (pricerange && taxrange && instalments)
        {
            document.getElementById("button").disabled = false;
            document.getElementById("error-carprice").innerHTML = "";
            document.getElementById("error-tax").innerHTML = "";
            document.getElementById("error-inst").innerHTML = "";
        } 
        else
        {
            document.getElementById("button").disabled = true;

            if (!pricerange)
            {
                document.getElementById("error-carprice").innerHTML = " Must be between 100 and 100000!";
            } else
            {
                document.getElementById("error-carprice").innerHTML = "&#10003;";
            }

            if (!taxrange)
            {
                document.getElementById("error-tax").innerHTML = "Must be between 0 and 100!";
            } else
            {
                document.getElementById("error-tax").innerHTML = "&#10003;";
            }

            if (!instalments)
            {
                document.getElementById("error-inst").innerHTML = " Must be between 0 and 12!";
            } else
            {
                document.getElementById("error-inst").innerHTML = "&#10003;";
            }

        }
    }
    submitForm()
    {
        if(document.getElementById('button').disabled==false)
            document.getElementById("price-form").submit();    
    }
    getBasePrice()
    {
        var d = new Date();
        var timestamp = parseInt(d.getTime() / 1000);
        document.getElementById("now").innerHTML = timestamp;
        var isFriday = (d.getDay() == this.custday  && d.getHours() >= this.custminHR && d.getHours() < this.custmaxHR);
        var baseprice = isFriday ? this.custprice : this.baseprice ;
        document.getElementById("base").innerHTML = baseprice;
        document.getElementById("baseprice").value = baseprice;
    }

}
