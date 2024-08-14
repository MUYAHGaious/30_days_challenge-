<?php

echo    "<span>Hello World!</span>";

?>

<style>
    span{
        font-family: 'Courier New', Courier, monospace;
        font-size: 500%;
        display: flex;
        justify-content: center;
        margin: 50% 0 50% 0; 
        white-space: nowrap;
        animation: typing 4s steps(20, end), blinkCaret 0.75s step-end infinite;
        overflow: hidden;
        border-right: 5px solid black;
    }

    @keyframes typing {
            0% { width: 0ch; }
            50% { width: 20ch; }
            100% { width: 0ch; }
        }

        @keyframes blinkCaret {
            50% { border-color: transparent; }
        }
</style>
