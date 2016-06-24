function [ ] = dreiD_plane( ardu )
%UNTITLED5 Summary of this function goes here
%   Detailed explanation goes here

%X: "um X-Achse" drehung
%Y: "um Y-Achse" drehung

myaxes = axes('xlim', [-150,150], 'ylim', [-200 200], 'zlim', [-100 ,100]);
view(3);
grid on;
xlabel('x');
ylabel('y');
zlabel('z');

[X,Y] = meshgrid(-105:40:105,-155:50:155);
Z = 0.0000*X+1;
h(1)=surface(X,Y,Z);
view(3);
axis on;

combinedobject = hgtransform('parent', myaxes);
set(h, 'parent', combinedobject)
drawnow

Ymax=2.95;
Ymin=2.5;
Ymittel=abs(Ymax-Ymin);

Xmax=3.15;
Xmin=2.75;
Xmittel=abs(Xmax-Xmin);

zaehl=0;
while zaehl<60
    
    Xvolt=readVoltage(ardu,'A0');
    Yvolt=readVoltage(ardu,'A1');
    
    xrotm = makehgtform('xrotate', ((pi/180)*(Xvolt-Xmittel)*(20/(Xmittel))));
    set(combinedobject, 'matrix', xrotm);
    
    yrotm= makehgtform('yrotate',(0.45*pi+(pi/180)*(Yvolt-Ymittel)*(-15/Ymittel)));
    set(combinedobject, 'matrix', yrotm);
    
    pause(1);
    zaehl=zaehl+1;
end




end

