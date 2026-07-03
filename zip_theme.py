
import zipfile
import os

def zipdir(path, ziph):
    for root, dirs, files in os.walk(path):
        for file in files:
            file_path = os.path.join(root, file)
            arcname = os.path.relpath(file_path, start=os.path.join(path, '..'))
            ziph.write(file_path, arcname)

with zipfile.ZipFile('cha-cambodia-theme.zip', 'w', zipfile.ZIP_DEFLATED) as zipf:
    zipdir('cha-cambodia-theme', zipf)

print('Theme zip created: cha-cambodia-theme.zip!')
