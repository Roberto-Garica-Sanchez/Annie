<?php
include "php_serial.class.php";

// Comencemos la clase
$serial = new phpSerial;

// Primero debemos especificar el dispositivo. Esto funciona tanto en Linux como en Windows (si
// su dispositivo serie de Linux es / dev / ttyS0 para COM1, etc.)
$serial->deviceSet("COM9");

// Podemos cambiar la velocidad en baudios, la paridad, la longitud, los bits de parada, el control de flujo
$serial->confBaudRate(9600);
$serial->confParity("none");
$serial->confCharacterLength(8);
$serial->confStopBits(1);
$serial->confFlowControl("none");

// Entonces tenemos que abrirlo
$serial->deviceOpen();

// Escribir en
$serial->sendMessage("Hello !");

// O para leer de
$read = $serial->readPort();

// If you want to change the configuration, the device must be closed
$serial->deviceClose();

// We can change the baud rate
$serial->confBaudRate(9600);

// etc...
//
//
/* Notes from Jim :
> Also, one last thing that would be good to document, maybe in example.php:
>  The actual device to be opened caused me a lot of confusion, I was
> attempting to open a tty.* device on my system and was having no luck at
> all, until I found that I should actually be opening a cu.* device instead!
>  The following link was very helpful in figuring this out, my USB/Serial
> adapter (as most probably do) lacked DTR, so trying to use the tty.* device
> just caused the code to hang and never return, it took a lot of googling to
> realize what was going wrong and how to fix it.
>
> http://lists.apple.com/archives/darwin-dev/2009/Nov/msg00099.html

Riz comment : I've definately had a device that didn't work well when using cu., but worked fine with tty. Either way, a good thing to note and keep for reference when debugging.
 */ 
?>
