<li class="has-submenu">
    <a href="/adm/purchase/progress-invoices">
        <i class="mdi mdi-card-bulleted-settings-outline"></i>Extra <div class="arrow-down"></div></a>
    <ul class="submenu">
        <li class="has-submenu">
            <a href="/adm/purchase/progress-invoices">Progress Invoices <div class="arrow-down"></div></a>
            <ul class="submenu">
                <li>
                    <a href="/adm/purchase/progress-invoices">Show</a>
                </li> 
            </ul>
        </li> 
        <li class="has-submenu">
            <a href="/adm/purchase/on-stock-diamonds">On Stock Diamonds<div class="arrow-down"></div></a>
            <ul class="submenu">
                <li>
                    <a href="/adm/purchase/on-stock-diamonds">Show</a>
                </li>                                
            </ul>
        </li>

        <li class="has-submenu">
            <a href="/adm/cache">Info<div class="arrow-down"></div></a>
            <ul class="submenu">
                <li>
                    <a href="/adm/cache">Data</a>
                </li>                                
            </ul>
        </li>

       @canany(['admin','purchase'])

        <li class="has-submenu">
            <a href="/adm/purchase/dued-progress-invoices"> Purchase <div class="arrow-down"></div></a>
            <ul class="submenu">
                <li>
                    <a href="/adm/purchase/dued-progress-invoices">Dued Diamond Invoice</a>
                </li>                               
            </ul>
        </li>

        @endcanany

       @canany(['admin','purchase'])

        <li class="has-submenu">
            <a href="/adm/accounting/invoice-export">Invoice Export <div class="arrow-down"></div></a>
            <ul class="submenu">
                <li>
                    <a href="/adm/accounting/invoice-export">Invoice Export</a>
                </li>                                   
            </ul>
        </li>  

        <li class="has-submenu">
            <a href="/adm/accounting/invoices">invoices<div class="arrow-down"></div></a>
            <ul class="submenu">
                <li>
                    <a href="/adm/accounting/invoices">Invoices</a>
                </li>                                   
            </ul>
        </li>   

        @endcanany

    </ul>                        
</li> 

