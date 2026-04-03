import os
import glob

def patch_logo_size(filepath):
    with open(filepath, 'r', encoding='utf-8') as f:
        content = f.read()

    original_content = content

    # Upgrade sizes
    # Navbar
    content = content.replace(
        '<img src="logo.png" alt="ARIC Solutions Logo" class="h-12 w-auto drop-shadow-sm">',
        '<img src="logo.png" alt="ARIC Solutions Logo" class="h-[70px] w-auto drop-shadow-sm">'
    )
    
    # Mobile Menu
    content = content.replace(
        '<img src="logo.png" alt="ARIC Solutions Logo" class="h-10 w-auto drop-shadow-sm">',
        '<img src="logo.png" alt="ARIC Solutions Logo" class="h-14 w-auto drop-shadow-sm">'
    )

    # Footer
    content = content.replace(
        '<img src="logo.png" alt="ARIC Solutions Logo" class="h-14 w-auto mb-8 drop-shadow-sm">',
        '<img src="logo.png" alt="ARIC Solutions Logo" class="h-20 w-auto mb-8 drop-shadow-sm">'
    )

    if content != original_content:
        with open(filepath, 'w', encoding='utf-8') as f:
            f.write(content)
        print(f"Size patched in {filepath}")
    else:
        print(f"No changes in {filepath}")

if __name__ == '__main__':
    html_files = glob.glob('/Users/mac/DOSSIER_MOSES/TINITZ/refonte_aric/*.html')
    for file in html_files:
        try:
            patch_logo_size(file)
        except Exception as e:
            print(f"Error {file}: {e}")
