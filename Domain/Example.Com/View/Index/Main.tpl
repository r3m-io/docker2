{{R3M}}
<section name="main">
    <div class="logo">
        <a href="https://www.r3m.io/" title="https://www.r3m.io"><img src="{{host.url()}}Icon/android-chrome-192x192.png" alt="R3M Logo"></a>
    </div>
    <h1><a href="https://www.r3m.io/" title="https://www.r3m.io/"><strong>{{literal}}{{</strong>R3M<strong>}}{{/literal}}</strong></a></h1>
    <h3>About</h3>
    <p>
        R3M/Framework is a robust, high-performance PHP framework that streamlines the process of developing comprehensive websites and applications. <br>
        Here are some key attributes that distinguish this framework: <br>
    </p>
    <ol>
    <li>
        <p>
            <b>Rapid Performance:</b><br>
            The utilization of PHP's OpCache by the framework ensures speedy performance, resulting in enhanced efficiency and user experience.<br>
        </p>
    </li>
    <li>
        <p>
            <b>Package Compatibility:</b><br>
            The framework flaunts interoperability with a multitude of other packages, such as the symfony-mailer and doctrine, which fosters versatility and eases the task of integrating different functionalities in your application.<br>
        </p>
    </li>
    <li>
        <p>
            <b>Enhanced Flexibility with Plugins and Traits:</b><br>
            R3M/language feature of the framework facilitates the use of plugins (functions & modifiers) and traits, allowing developers to broaden their application capabilities and adapt their code to more eclectic requirements.<br>
        </p>
    </li>
    <li>
        <p>
            <b>JSON Scripting:</b><br>
            An intriguing feature of this framework is its ability to script in JSON. This not only makes development more flexible but also makes it compatible with various data exchange formats, making R3M/Framework a more versatile tool for modern web development.<br>
        </p>
    </li>
    <li>
        <p>
            <b>User-friendly:</b><br>
            Despite being powerful, R3M/Framework doesn't compromise on the ease of use, making it well-suited for both beginners venturing into web application development and seasoned developers seeking powerful tools.<br>
        </p>
    </li>
    </ol>
    <p>
        All in all, R3M/Framework fuses power with ease and flexibility, offering an optimal toolset that caters well to contemporary web application development needs.
    </p>
    <h3>License</h3>
    <pre>
{{file.read(config('framework.dir.root') + 'LICENSE')}}
    </pre>
    <h3>Support</h3>
    <p>
        If you want support, you can get it! <br>
        Contact <a href="mailto:info@universeorange.com">info@universeorange.com</a>.
    </p>
    <h3>Debug</h3>
    {{if(config('framework.environment') === 'development')}}
    {{d(config())}}
    {{d(data())}}
    {{/if}}

</section>

