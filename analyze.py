import sys
import os
import pandas as pd
import matplotlib.pyplot as plt

# Check karein ki PHP ne file ka naam bheja hai ya nahi
if len(sys.argv) < 2:
    print("Error: No file provided to Python.")
    sys.exit()

file_path = sys.argv[1]

try:

    df = pd.read_csv(file_path)
    
    print("<h3>Dataset Analysis Results:</h3>")
    print(f"<ul>")
    print(f"<li><b>Total Rows:</b> {df.shape[0]}</li>")
    print(f"<li><b>Total Columns:</b> {df.shape[1]}</li>")
    print(f"<li><b>Column Names:</b> {', '.join(df.columns)}</li>")
    print(f"</ul>")

    if df.shape[1] >= 2:
        plt.figure(figsize=(6, 4))
        df.iloc[:, 1].value_counts().head(5).plot(kind='bar', color='teal')
        plt.title('Top Values Distribution')
        plt.xlabel('Categories')
        plt.ylabel('Count')
        
        output_img = "outputs/summary_chart.png"
        plt.savefig(output_img)
        plt.close()
        
        print(f"<p>Visual Graph Generated Successfully!</p>")
        print(f"<img src='{output_img}' alt='Graph' style='max-width:100%; height:auto;'>")

except Exception as e:
    print(f"<p style='color:red;'>Error analyzing file: {e}</p>")