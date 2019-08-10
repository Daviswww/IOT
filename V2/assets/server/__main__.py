from subprocess import Popen, PIPE, STDOUT
import os

p = Popen("cmd.exe /c" + "test.bat", stdout=PIPE, stderr=STDOUT)

curline = p.stdout.readline()
while (curline != b''):
   print(curline)
   curline = p.stdout.readline()

p.wait()
print(p.returncode)