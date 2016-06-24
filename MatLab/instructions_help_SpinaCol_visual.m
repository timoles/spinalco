%how to use sensor_timegraph & dreiD_plane

%first, create an arduino oject with correct port. Important: do this only
%ONCE! (in main window, dont execute this file several times)
%BAUD=9600 /look into your pc device manager

ardi=arduino('COM6','Uno') 

%now you can execute the functions

%you ll receive a plot with the values from the potentiometers
sensor_timegraph(ardu);
%will stop after certain time


%dreiD_plane
dreiD_plane(ardi);
%needs to be interrupted with CTRL+C
